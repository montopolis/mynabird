if (Nova) {
    Nova.booting((Vue, router) => {
        // Load components
        Vue.component('alert-feed', require('./components/AlertFeed'));
        Vue.component('alert-panel', require('./components/AlertPanel'));
        Vue.component('alert-message', require('./components/AlertMessage'));
    });
} else {
    console.error("mynabird::error Could not find Nova!");
}

