@php($config = app()->make('config'))
<script src="{{ mix('/js/mynabird_alert_feed.js', 'vendor/mynabird') }}"></script>
@if(data_get($config, 'mynabird.should_broadcast'))
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    window.pusher = new Pusher('{{ data_get($config, 'broadcasting.connections.pusher.key') }}', {
        cluster: '{{ data_get($config, 'broadcasting.connections.pusher.options.cluster') }}'
    });
</script>
@endif