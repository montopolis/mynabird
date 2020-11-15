@php($config = app()->make('config'))
<alert-feed :config="{{
    json_encode(array_merge(data_get($config, 'mynabird', []), [
        'pusher' => [
            'key' => data_get($config, 'broadcasting.connections.pusher.key'),
            'cluster' => data_get($config, 'broadcasting.connections.pusher.options.cluster'),
        ],
    ]))
}}"></alert-feed>
