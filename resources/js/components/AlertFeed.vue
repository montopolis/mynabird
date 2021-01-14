<template>
    <div v-if="alerts != null">
        <div @click="togglePanel" class="cursor-pointer notification-dropdown text-center alert-button" style="width:40px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path class="heroicon-ui" d="M15 19a3 3 0 0 1-6 0H4a1 1 0 0 1 0-2h1v-6a7 7 0 0 1 4.02-6.34 3 3 0 0 1 5.96 0A7 7 0 0 1 19 11v6h1a1 1 0 0 1 0 2h-5zm-4 0a1 1 0 0 0 2 0h-2zm0-12.9A5 5 0 0 0 7 11v6h10v-6a5 5 0 0 0-4-4.9V5a1 1 0 0 0-2 0v1.1z"/>
            </svg>
            <div class="badge" v-show="alerts && alerts.unread > 0">
                {{ alerts.unread }}
            </div>
        </div>
        <div v-show="isPanelVisible">
            <alert-panel
                :config="config"
                :alerts="alerts"
                @alertRead="markAlertRead($event)"
                @changePage="changePage($event)"
                @togglePanel="togglePanel">
            </alert-panel>
        </div>
    </div>
</template>

<script>
const ENDPOINT = '/mynabird/alerts';
import { toast, bindings } from '../mynabird_interop';

export default {
    name: 'MynabirdAlertFeed',
    props: ['config'],
    data () {
        return {
            alerts: null,
            isPanelVisible: false,
        }
    },
    methods: {
        togglePanel: function () {
            this.isPanelVisible = !this.isPanelVisible
        },
        changePage: function (page, callback) {
            Nova.request().get(`${ENDPOINT}?page=${page}`)
                .then(response => {
                    this.alerts = response.data;
                    callback && callback();
                })
        },
        markAlertRead(alert) {
            if (!alert.read_at) {
                Nova.request().post(`${ENDPOINT}/read`, {alert_ids: [alert.id]})
                    .then(response => {
                        this.alerts.unread--;
                    })
                    .catch(error => {
                        error('There was a problem trying to mark the alert as read', error);
                    })
            }
        },
        reload() {
            this.changePage(this.alerts.current_page);
        },
        bindPusher() {
            const self = this;
            const callback = (data) => {
                toast(self, data.level, data.title);
                self.reload();
            };
            bindings(['broadcast', `user.${this.alerts.user_id}`], callback, self.config);
        },
    },
    mounted() {
        this.changePage(1, this.bindPusher);
    },
}
</script>

<style lang="scss" scoped>
.alert-button {
    color: white;
    display: inline-block;
    position: relative;
}
.badge {
    background-color: #fa3e3e;
    border-radius: 2px;
    color: white;
    padding: 1px 3px;
    font-size: 10px;
    position: absolute;
    top: 0;
    right: 5px;
}
</style>
