# Mynabird

Laravel/Nova package for Facebook-style alerts.

@todo: screenshot

## Getting started

composer

```
composer require montopolis/mynabird
```

```
php artisan vendor:publish ???
```

```
// in config/app.php
// @todo: add the service provider
\Montopolis\Mynabird\MynabirdAlertsLaravelServiceProvider::class,
```

```
@include('mynabird::alert-feed')
```

```
@include('mynabird::javascript')
```



