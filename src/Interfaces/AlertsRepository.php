<?php

namespace Montopolis\Mynabird\Interfaces;

use Montopolis\Mynabird\DataObjects\Alert;
use Montopolis\Mynabird\DataObjects\AlertId;
use Montopolis\Mynabird\DataObjects\UserId;

interface AlertsRepository
{
    /**
     * Store a single alert. Broadcasts the NewAlert event after record has been inserted into the database.
     * @param Alert $alert
     */
    public function store(Alert $alert): void;

    /**
     * Find a single alert for a given user. Returns null if the alert cannot be found.
     * @param UserId $userId
     * @param AlertId $id
     * @return Alert|null
     */
    public function find(UserId $userId, AlertId $id): ?Alert;

    /**
     * Returns a page of alerts for a given user ID. Newer alerts appear first.
     * @param UserId $userId
     * @param int $page
     * @return array
     */
    public function paginateForUser(UserId $userId, int $page = 1): array;

    /**
     * Mark a list of alert IDs as read.
     * @param UserId $userId
     * @param array $alertIds
     */
    public function markAsRead(UserId $userId, array $alertIds): void;

    /**
     * Mark all unread alerts as read for a given user.
     * @param UserId $userId
     */
    public function markAllAsRead(UserId $userId): void;
}
