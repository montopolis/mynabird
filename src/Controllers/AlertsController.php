<?php

declare(strict_types=1);

namespace Montopolis\Mynabird\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Montopolis\Mynabird\DataObjects\Alert;
use Montopolis\Mynabird\DataObjects\AlertId;
use Montopolis\Mynabird\Interfaces\IdentityProvider;
use Montopolis\Mynabird\Interfaces\AlertsRepository;

class AlertsController
{
    protected $identityProvider;
    protected $alertsRepository;

    public function __construct(IdentityProvider $identityProvider, AlertsRepository $alertsRepository)
    {
        $this->identityProvider = $identityProvider;
        $this->alertsRepository = $alertsRepository;
    }

    public function index(Request $request)
    {
        $page = (int) $request->get('page', 1);

        $userId = $this->identityProvider->getAuthenticatedUserId();

        $current = $userId ? $this->alertsRepository->paginateForUser($userId, $page) : [
            'items' => [],
            'total' => 0,
            'unread' => 0,
        ];

        $current['items'] = array_map(function (Alert $alert) {
            return [
                'id' => $alert->getId(),
                'title' => $alert->getTitle(),
                'body' => $alert->getBody(),
                'level' => $alert->getLevel(),
                'url' => $alert->getUrl(),
                'is_broadcast' => $alert->isBroadcast(),
                'read_at' => $alert->getReadAt() ? ''.$alert->getReadAt() : null,
                'created_at' => ''.$alert->getCreatedAt(),
            ];
        }, $current['items']);

        return new JsonResponse(array_merge([
            'user_id' => $userId ? $userId->asInt() : null,
            'current_page' => $page,
            'per_page' => 25,
        ], $current));
    }

    public function show(int $id)
    {
        $userId = $this->identityProvider->getAuthenticatedUserId();
        if ($alert = $this->alertsRepository->find($userId, new AlertId($id))) {
            return new JsonResponse([
                'id' => $alert->getId(),
                'title' => $alert->getTitle(),
                'body' => $alert->getBody(),
                'level' => $alert->getLevel(),
                'url' => $alert->getUrl(),
                'is_broadcast' => $alert->isBroadcast(),
                'read_at' => $alert->getReadAt() ? ''.$alert->getReadAt() : null,
                'created_at' => ''.$alert->getCreatedAt(),
            ]);
        }
        return new JsonResponse([], 404);
    }

    public function postRead(Request $request)
    {
        $userId = $this->identityProvider->getAuthenticatedUserId();

        if ($userId) {
            $alertIds = array_map(function ($alertId) {
                return new AlertId((int) $alertId);
            }, $request->get('alert_ids'));

            $this->alertsRepository->markAsRead($userId, $alertIds);

            return new JsonResponse([], 201);
        }

        return new JsonResponse([], 401);
    }

    public function postAllRead()
    {
        $userId = $this->identityProvider->getAuthenticatedUserId();

        if ($userId) {
            $this->alertsRepository->markAllAsRead($userId);

            return new JsonResponse([], 201);
        }

        return new JsonResponse([], 401);
    }
}
