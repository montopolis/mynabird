# Mynabird

Laravel/Nova package for Facebook-style alerts.

Currently supports Pusher for real-time notification when a new alert is received (and dynamic update of the unread counter).

@todo: insert screenshot

## Installation

The package can be installed through Composer.

```bash
composer require montopolis/mynabird
```

Make sure all vendor files are published and migrations run:

```bash
php artisan vendor:publish --provider="Montopolis\Mynabird\MynabirdServiceProvider"
php artisan migrate
```

Add these two lines to the layout template:

```html
// file: resources/views/vendor/nova/layout.blade.php

  ...

  <dropdown class="ml-auto h-9 flex items-center dropdown-right">
      @include('nova::partials.user')
  </dropdown>

  @include('mynabird::alert-feed') <!-- AND THIS LINE HERE -->

  ...

    <!-- Build Nova Instance -->
    <script>
        window.Nova = new CreateNova(config)
    </script>

    <!-- Alerts -->
    @include('mynabird::javascript') <!-- INCLUDE THIS LINE HERE -->

   ...
```

If you wish to use real-time notifications, make sure Pusher is configured via `config/broadcasting.php`. Alternatively you may disable real-time notifications via the Mynabird configuration:

```php
<?php
// in config/mynabird.php
return [
    'should_broadcast' => false,
];
```

If broadcasting is disabled users will need to refresh to see new alerts.

## Usage

You can trigger alerts using the `AlertRepository`:

```php
<?php

declare(strict_types=1);

namespace App\Console;

use Montopolis\Mynabird\DataObjects\Alert;
use Montopolis\Mynabird\Interfaces\AlertsRepository;

class BroadcastAlert extends Command
{
    protected $signature = 'app:broadcast-alert';
    protected $description = 'Send an alert to all users.';

    protected $alertsRepository;

    public function __construct(AlertsRepository $alertsRepository)
    {
        parent::__construct();
        $this->alertsRepository = $alertsRepository;
    }

    public function handle()
    {
        // etc...

        $alert = new Alert(
            null,
            $title,
            $body,
            $url,
            $level,
            null,
            true
        );

        $this->alertsRepository->store($alert);
    }
}
```

## Credits

* UI and stylesheets adapted from [coreproc/nova-notification-feed](https://github.com/coreproc/nova-notification-feed).

## License

This software uses the MIT License. Please see [License File](LICENSE.md) for more information.


