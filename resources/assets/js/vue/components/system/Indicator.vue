<template>
    <div class="indicator-container" v-if="open">
        <div class="indicator-backdrop"></div>
        <div class="indicator">
            <div class="indicator-icon">
                <img src="/images/indicator.svg"/>
            </div>
            <div v-if="message" class="loading-label mb-5">{{ message }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Indicator",
        data: function () {
            return {
                message: null,
                open: false
            }
        },
        methods: {
            show: function (message) {
                this.message = message;
                this.open = true;
            },
            hide: function () {
                this.message = null;
                this.open = false;
            }
        }
    }
</script>