<?php

declare(strict_types=1);

namespace Montopolis\Mynabird\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewAlert implements ShouldBroadcast
{
    public $alertId;
    public $title;
    public $body;
    public $level;
    public $userId;
    private $broadcast = true;

    public function __construct(int $alertId, string $title, string $body, string $level, ?int $userId = null)
    {
        $this->alertId = $alertId;
        $this->title = $title;
        $this->body = $body;
        $this->level = $level;
        $this->userId = $userId;
    }

    public function getAlertId(): int
    {
        return $this->alertId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function suppressBroadcast($suppress = true): void
    {
        $this->broadcast = !$suppress;
    }

    public function broadcastOn(): array
    {
        if (!$this->broadcast) {
            return [];
        }

        return $this->userId ? ["user.{$this->userId}"] : ['broadcast'];
    }

    public function broadcastAs(): string
    {
        return 'new_alert';
    }

    public function broadcastWith(): array
    {
        return ['id' => $this->alertId, 'title' => $this->title, 'level' => $this->level];
    }
}
