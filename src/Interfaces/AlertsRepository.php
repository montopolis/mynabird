<?php

namespace Montopolis\Mynabird\Interfaces;

use Montopolis\Mynabird\DataObjects\Alert;
use Montopolis\Mynabird\DataObjects\AlertId;
use Montopolis\Mynabird\DataObjects\UserId;

interface AlertsRepository
{
    public function store(Alert $alert): void;

    public function find(UserId $userId, AlertId $id): ?Alert;

    public function paginateForUser(UserId $userId, int $page = 1): array;

    public function markAsRead(UserId $userId, array $alertIds): void;

    public function markAllAsRead(UserId $userId): void;
}
