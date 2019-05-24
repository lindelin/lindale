<template>
    <div class="wrapper" v-if="messages.length > 0">
        <div class="row" v-for="message in messages">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div :class="'alert alert-dismissible fade show ' + type" role="alert">
                    <strong v-if="title">{{ title }}</strong> {{ message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            messages: {
                type: Array,
                require: false,
                default: []
            },
            type: {
                type: String,
                require: false,
                default: null
            },
            title: {
                type: String,
                require: false,
                default: null
            }
        }
    }
</script>

<style scoped>
    .wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        margin: 16px;
        z-index: 999999999999;
    }
    .wrapper > .row > div {
        margin-left: auto;
        margin-right: 0;
    }
</style>