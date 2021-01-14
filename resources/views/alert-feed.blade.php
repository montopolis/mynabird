@php($config = app()->make('config'))
<alert-feed :config="{{
    json_encode(array_merge(\Montopolis\Mynabird\Support\Arr::get($config, 'mynabird', []), [
        'pusher' => [
            'key' => \Montopolis\Mynabird\Support\Arr($config, 'broadcasting.connections.pusher.key'),
            'cluster' => \Montopolis\Mynabird\Support\Arr($config, 'broadcasting.connections.pusher.options.cluster'),
        ],
    ]))
}}"></alert-feed>
