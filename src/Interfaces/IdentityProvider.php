<?php

declare(strict_types=1);

namespace Montopolis\Mynabird\Interfaces;

use Montopolis\Mynabird\DataObjects\UserId;

interface IdentityProvider
{
    public function getAuthenticatedUserId(): ?UserId;
}
