<?php

declare(strict_types=1);

namespace Montopolis\Mynabird\Adapters\Laravel;

use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Montopolis\Mynabird\DataObjects\Alert;
use Montopolis\Mynabird\DataObjects\AlertId;
use Montopolis\Mynabird\DataObjects\UserId;
use Montopolis\Mynabird\Events\NewAlert;
use Montopolis\Mynabird\Interfaces\AlertsRepository;
use Montopolis\Mynabird\Models\Alert as AlertModel;
use Montopolis\Mynabird\Models\AlertRecipient as AlertRecipientModel;
use Montopolis\Mynabird\Support\Arr;

class LaravelAlertsRepository implements AlertsRepository
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @inheritDoc
     */
    public function store(Alert $alert): void
    {
        $model = $this->alertModel()
            ->fill([
                'title' => $alert->getTitle(),
                'body' => $alert->getBody(),
                'is_broadcast' => $alert->isBroadcast(),
                'url' => $alert->getUrl(),
                'level' => $alert->getLevel(),
            ]);
        $model->save();

        if ($recipientId = $alert->getRecipientId()) {
            $this->recipientModel()
                ->fill([
                    'alert_id' => $model->id,
                    'recipient_id' => $recipientId,
                ])
                ->save();
        }

        $event = new NewAlert(
            $model->id,
            $alert->getTitle(),
            $alert->getBody(),
            $alert->getLevel(),
            $alert->getRecipientId() ?: null
        );

        if (Arr::get($this->app['config']['mynabird'], 'should_broadcast', true) === false) {
            $event->suppressBroadcast();
        }

        $this->app['events']->dispatch($event);
    }

    /**
     * @inheritDoc
     */
    public function find(UserId $userId, AlertId $id): ?Alert
    {
        $alertsTable = $this->alertModel()->getTable();

        if ($row = $this->query($userId->asInt())
            ->where("{$alertsTable}.id", $id->asInt())
            ->first()) {
            $id = (int) Arr::get($row, 'id');
            $title = Arr::get($row, 'title');
            $body = Arr::get($row, 'body');
            $url = Arr::get($row, 'url');
            $level = Arr::get($row, 'level') ?: 'info';
            $recipientId = Arr::get($row, 'recipient_id') ?: null;
            $recipientId = $recipientId ? (int) $recipientId : null;
            $isBroadcast = (bool) Arr::get($row, 'is_broadcast');
            $readAt = Arr::get($row, 'read_at');
            $readAt = $readAt ? new Carbon($readAt) : null;
            $createdAt = Arr::get($row, 'created_at');
            $createdAt = new Carbon($createdAt);
            return new Alert($id, $title, $body, $url, $level, $recipientId, $isBroadcast, $readAt, $createdAt);
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function paginateForUser(UserId $userId, int $page = 1): array
    {
        $page = $this->query($userId->asInt())
            ->paginate(25, ['*'], 'page', $page);

        return [
            'items' => array_map(function ($row) {
                $id = (int) Arr::get($row, 'id');
                $title = Arr::get($row, 'title');
                $body = Arr::get($row, 'body');
                $url = Arr::get($row, 'url');
                $level = Arr::get($row, 'level') ?: 'info';
                $recipientId = Arr::get($row, 'recipient_id') ?: null;
                $recipientId = $recipientId ? (int) $recipientId : null;
                $isBroadcast = (bool) Arr::get($row, 'is_broadcast');
                $readAt = Arr::get($row, 'read_at');
                $readAt = $readAt ? new Carbon($readAt) : null;
                $createdAt = Arr::get($row, 'created_at');
                $createdAt = new Carbon($createdAt);

                return new Alert($id, $title, $body, $url, $level, $recipientId, $isBroadcast, $readAt, $createdAt);
            }, $page->items()),
            'total' => $page->total(),
            'unread' => $this->query($userId->asInt())
                ->whereNull('read_at')
                ->count(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function markAsRead(UserId $userId, array $alertIds): void
    {
        $ids = array_map(function (AlertId $alertId) {
            return $alertId->asInt();
        }, $alertIds) ?: [0];

        // Update user specific alerts
        $this->recipientModel()
            ->newQuery()
            ->where('recipient_id', $userId->asInt())
            ->whereIn('alert_id', $ids)
            ->update(['read_at' => Carbon::now()]);

        // Update broadcast alerts
        $saved = $this->recipientModel()
            ->newQuery()
            ->where('recipient_id', $userId->asInt())
            ->whereIn('alert_id', $ids)
            ->get()
            ->pluck('alert_id')
            ->all();
        $missing = array_diff($ids, $saved);
        $inserts = [];
        foreach ($missing as $id) {
            $inserts[] = [
                'alert_id' => $id,
                'recipient_id' => $userId->asInt(),
                'read_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        $this->recipientModel()
            ->newQuery()
            ->insert($inserts);
    }

    /**
     * @inheritDoc
     */
    public function markAllAsRead(UserId $userId): void
    {
        $alertsTable = $this->alertModel()->getTable();
        $recipientsTable = $this->recipientModel()->getTable();

        $this->recipientModel()
            ->newQuery()
            ->where('recipient_id', $userId->asInt())
            ->update(['read_at' => Carbon::now()]);

        $ids = $this->alertModel()
            ->newQuery()
            ->where('is_broadcast', true)
            ->leftJoin($recipientsTable, "{$alertsTable}.id", '=', "{$recipientsTable}.alert_id")
            ->whereNull("{$recipientsTable}.id")
            ->get()
            ->pluck("{$alertsTable}.id")
            ->all();

        $inserts = array_map(function (int $id) use ($userId) {
            return [
                'alert_id' => $id,
                'recipient_id' => $userId->asInt(),
                'read_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }, $ids) ?: [];

        if ($inserts) {
            $this->recipientModel()
                ->newQuery()
                ->insert($inserts);
        }
    }

    /**
     * Create a query to retrieve all alerts a user should be able to see (broadcast _and_ user specific).
     */
    private function query(int $userId): Builder
    {
        $alertsTable = $this->alertModel()->getTable();
        $recipientsTable = $this->recipientModel()->getTable();

        $q = $this->alertModel()
            ->newQuery()
            ->select([
                "{$alertsTable}.id",
                "{$alertsTable}.title",
                "{$alertsTable}.body",
                "{$alertsTable}.is_broadcast",
                "{$alertsTable}.url",
                "{$alertsTable}.level",
                "{$recipientsTable}.read_at",
                "{$recipientsTable}.recipient_id",
                "{$alertsTable}.created_at",
            ])
            ->leftJoin($recipientsTable, "{$alertsTable}.id", '=', "{$recipientsTable}.alert_id")
            ->orderBy("{$alertsTable}.id", 'desc')
            ->where(function ($sq) use ($userId, $alertsTable, $recipientsTable) {
                $sq->where("{$alertsTable}.is_broadcast", true)
                    ->orWhere("{$recipientsTable}.recipient_id", $userId);
            });

        return $q;
    }

    private function alertModel(): AlertModel
    {
        return $this->app->make(AlertModel::class);
    }

    private function recipientModel(): AlertRecipientModel
    {
        return $this->app->make(AlertRecipientModel::class);
    }
}
