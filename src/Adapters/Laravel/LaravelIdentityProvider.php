<?php

declare(strict_types=1);

namespace Montopolis\Mynabird\Adapters\Laravel;

use Illuminate\Contracts\Foundation\Application;
use Montopolis\Mynabird\DataObjects\UserId;
use Montopolis\Mynabird\Interfaces\IdentityProvider;

class LaravelIdentityProvider implements IdentityProvider
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getAuthenticatedUserId(): ?UserId
    {
        if ($user = $this->app->make('auth')->user()) {
            return new UserId($user->id);
        }

        return null;
    }
}
