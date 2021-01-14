@php($config = app()->make('config'))
<script src="{{ mix('/js/mynabird_alert_feed.js', 'vendor/mynabird') }}"></script>
@if(\Montopolis\Mynabird\Support\Arr::get($config, 'mynabird.should_broadcast'))
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    window.pusher = new Pusher('{{ \Montopolis\Mynabird\Support\Arr::get($config, 'broadcasting.connections.pusher.key') }}', {
        cluster: '{{ \Montopolis\Mynabird\Support\Arr::get($config, 'broadcasting.connections.pusher.options.cluster') }}'
    });
</script>
@endif