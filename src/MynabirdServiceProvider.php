<?php

declare(strict_types=1);

namespace Montopolis\Mynabird;

use Illuminate\Support\ServiceProvider;
use Montopolis\Mynabird\Adapters\Laravel\LaravelIdentityProvider;
use Montopolis\Mynabird\Adapters\Laravel\LaravelAlertsRepository;
use Montopolis\Mynabird\Interfaces\IdentityProvider;
use Montopolis\Mynabird\Interfaces\AlertsRepository;

class MynabirdServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mynabird');

        $this->publishes([
            __DIR__.'/../dist/' => $this->publicPath('vendor/mynabird'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../config/mynabird.php' => $this->configPath('mynabird.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind(IdentityProvider::class, LaravelIdentityProvider::class);
        $this->app->bind(AlertsRepository::class, LaravelAlertsRepository::class);
    }

    private function publicPath(string $relative): string
    {
        return $this->app->make('path.public').($relative ? DIRECTORY_SEPARATOR.ltrim($relative, DIRECTORY_SEPARATOR) : $relative);
    }

    private function configPath(string $relative): string
    {
        return $this->app->make('path.config').($relative ? DIRECTORY_SEPARATOR.ltrim($relative, DIRECTORY_SEPARATOR) : $relative);
    }
}
