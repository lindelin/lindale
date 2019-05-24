<template>
    <transition name="fade">
        <div class="page-loader" v-if="on">
            <img src="/images/loader.svg">
        </div>
    </transition>
</template>

<script>
    export default {
        name: "Loader",
        data: function () {
            return {
                on: true
            }
        },
        methods: {
            hide: function () {
                this.on = false;
            },
            show: function () {
                this.on = true;
            }
        }
    }
</script>