<template>
    <transition name="fade">
        <div class="loader" v-if="show">
            <img src="/images/loader.svg">
        </div>
    </transition>
</template>

<script>
    export default {
        name: "Loader",
        data: function () {
            return {
                show: true
            }
        },
        methods: {
            hide: function () {
                this.show = false;
            },
            show: function () {
                this.show = true;
            }
        }
    }
</script>