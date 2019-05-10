<template>
    <div class="loader" v-if="">
        <img src="/images/loader.svg">
    </div>
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

        }
    }
</script>