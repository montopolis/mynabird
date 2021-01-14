<?php

declare(strict_types=1);

namespace Montopolis\Mynabird\Interfaces;

use Montopolis\Mynabird\DataObjects\UserId;

interface IdentityProvider
{
    /**
     * Returns currently authenticated user ID (or none if no authentication session is active).
     * @return UserId|null
     */
    public function getAuthenticatedUserId(): ?UserId;
}
