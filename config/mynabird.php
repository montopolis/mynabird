<?php

return [
    // If set to `true`, Mynabird will attempt to broadcast the NewAlert event when new alerts are stored so the frontend
    // can update in realtime. If a broadcast channel is not available you may set to `false` to stop the broadcast attempt.
    'should_broadcast' => true,

    // By default URLs from the alert feed will open in a new window when clicked. You may change this behaviour by setting
    // the flag below to `true`, in which case URLs will be opened in the current window.
    'open_links_in_same_window' => false,
];