<?php

declare(strict_types=1);

namespace Montopolis\Mynabird\DataObjects;

use Carbon\Carbon;
use InvalidArgumentException;

class Alert
{
    private $id;
    private $title;
    private $body;
    private $url;
    private $level;
    private $recipientId;
    private $isBroadcast;
    private $readAt;
    private $createdAt;

    public function __construct(?int $id, string $title, string $body, ?string $url, string $level, ?int $recipientId, bool $isBroadcast = false, ?Carbon $readAt = null, ?Carbon $createdAt = null)
    {
        if (! in_array($level, ['info', 'warning', 'success', 'error'])) {
            throw new InvalidArgumentException("Unknown alert level '{$level}'");
        }
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->url = $url;
        $this->level = $level;
        $this->recipientId = $recipientId;
        $this->isBroadcast = $isBroadcast;
        $this->readAt = $readAt;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function getRecipientId(): ?int
    {
        return $this->recipientId;
    }

    public function isBroadcast(): bool
    {
        return $this->isBroadcast;
    }

    public function getReadAt(): ?Carbon
    {
        return $this->readAt;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }
}
