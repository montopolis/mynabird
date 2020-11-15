<template>
    <div class="text-white alerts-panel">
        <div class="border-b border-80">
            <div class="text-center px-6" id="alerts-panel-close" @click="togglePanel">
                Close
            </div>
        </div>
        <div class="px-4 border-b border-80 overflow-y-scroll h-full">
            <div v-for="alert in alerts.items">
                <alert-message
                    :alert="alert"
                    :config="config"
                    @alertRead="alertRead($event)"></alert-message>
            </div>
            <div v-if="hasNext || hasPrev" class="pagination">
                <button v-if="hasPrev" class="prev" @click="prev" role="button">
                    &lt; Prev
                </button>
                <button v-if="hasNext" class="next" @click="next" role="button">
                    Next &gt;
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AlertPanel',
    props: [
        'config',
        'alerts',
        'changePage',
        'markAsRead',
        // 'markAllAsRead', // @todo
    ],
    computed: {
        hasNext: function () {
            if (!this.alerts) {
                return false;
            }
            const totalPages = this.alerts.total / this.alerts.per_page;
            return totalPages > 1 && this.alerts.current_page < totalPages;
        },
        hasPrev: function () {
            if (!this.alerts) {
                return false;
            }
            return this.alerts.current_page > 1;
        },
    },
    methods: {
        togglePanel: function () {
            this.$emit('togglePanel')
        },
        alertRead(alert) {
            this.$emit('alertRead', alert)
        },
        next() {
            this.$emit('changePage', this.alerts.current_page + 1);
        },
        prev() {
            this.$emit('changePage', this.alerts.current_page - 1);
        },
    },
}
</script>

<style lang="scss" scoped>
.alerts-panel {
    z-index: 999;
    position: fixed !important;
    right: 0;
    top: 0;
    width: 340px;
    height: 100%;
    background-color: #536170;
    padding-bottom: 70px;
}

#alerts-panel-close {
    height: 60px;
    line-height: 60px;
    cursor: pointer;
}

#alerts-panel-close:hover {
    background-color: #252D37;
}
.pagination {
    width: 100%;
    button {
        color: white;
        padding: 1.5rem;
    }
    .prev {
        float: left;
    }
    .next {
        float: right;
    }
}
</style>
