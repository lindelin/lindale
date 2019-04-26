<template>
    <status-card icon='<i class="mdi mdi-check-all text-danger icon-lg"></i>'
                 title="TODOs"
                 :status="status">
        <div class="wrapper">
            <div class="d-flex justify-content-between">
                <p class="mb-2">TODO Progress</p>
                <p class="mb-2 text-danger">{{ progress }}%</p>
            </div>
            <progress-bar :progress="progress" color="bg-danger"></progress-bar>
        </div>
    </status-card>
</template>

<script>
    import StatusCard from "../common/StatusCard";
    import ProgressBar from "../common/ProgressBar";
    export default {
        name: "TodoStatusCard",
        components: {ProgressBar, StatusCard},
        props: ['status', 'progress']
    }
</script>