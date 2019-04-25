<template>
    <div class="row purchace-popup" v-if="message">
        <div class="col-12">
            <span class="d-block d-md-flex align-items-center">
                <p>{{ message }}</p>
                <a class="btn ml-auto download-button d-none d-md-block" href="https://github.com/BootstrapDash/StarAdmin-Free-Bootstrap-Admin-Template" target="_blank">Download Free Version</a>
                <a class="btn purchase-button mt-4 mt-md-0" v-if="link" :href="link" target="_blank">View</a>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Notification",
        props: ['message', 'link'],
        mounted: function () {
            $(".purchace-popup .popup-dismiss").on("click",function(){
                $(".purchace-popup").slideToggle();
            });
        },
        data: function () {
            return {
                message: null,
                link: null
            }
        },
        methods: {
            notify: function (message, link = null) {
                this.message = message;
                this.link = link;
            }
        }
    }
</script>