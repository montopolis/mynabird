const error = (error) => {
    console.error("mynabird::error ", error);
};

const log = (message) => {
    console.log("mynabird::log ", message);
};

/**
 * Shows a toast message
 */
const toast = (context, type, message) => {
    if (context.$toasted) {
        console.log('sending toast message', context, type, message);
        context.$toasted.show(message, { type });
    } else {
        error("No toast message provider available.");
        log(`${type} ${message}`);
    }
};

/**
 * Perform event bindings to react on incoming published events from the backend
 */
const bindings = (channels, callback, config) => {
    console.log('bindings', channels, callback, config);
    if (config['should_broadcast'] && window['pusher']) {
        log('Pusher found. Adding event bindings.');
        channels.map((channel) => {
            log(`... subscribing to ${channel}`);
            window['pusher'].subscribe(channel)
                .bind('new_alert', callback);
        });
    } else {
        if (config['should_broadcast']) {
            error('Pusher not found. Skipping binding(s).');
        } else {
            log('Broadcasting disabled.');
        }
    }
};

export {error, log, toast, bindings};