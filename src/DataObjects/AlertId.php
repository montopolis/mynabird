<?php

declare(strict_types=1);

namespace Montopolis\Mynabird\DataObjects;

class AlertId
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function asInt(): int
    {
        return $this->id;
    }
}
