<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Montopolis\\Mynabird\\Controllers',
    'middleware' => ['web'],
    'prefix' => 'mynabird',
], function ($router) {
    $router->get('alerts', 'AlertsController@index');
    $router->get('alerts/{id}', 'AlertsController@show');
    $router->post('alerts/read', 'AlertsController@postRead');
    $router->post('alerts/all-read', 'AlertsController@postAllRead');
});
