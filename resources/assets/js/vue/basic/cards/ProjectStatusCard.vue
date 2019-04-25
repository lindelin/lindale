<template>
    <status-card icon='<i class="mdi mdi-cube text-danger icon-lg"></i>'
                 title="Total Revenue"
                 status="$324234234">
        <div class="wrapper">
            <div class="d-flex justify-content-between">
                <p class="mb-2">Sales</p>
                <p class="mb-2 text-primary">88%</p>
            </div>
            <div class="progress">
                <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </status-card>
</template>

<script>
    import StatusCard from "../common/StatusCard";
    export default {
        name: "ProjectStatusCard",
        components: {StatusCard},
        data: function () {
            return {
            }
        },
    }
</script>