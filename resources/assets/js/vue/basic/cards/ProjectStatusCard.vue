<template>
    <status-card icon='<i class="mdi mdi-folder-multiple-outline text-info icon-lg"></i>'
                 title="Projects"
                 :status="status">
        <div class="wrapper">
            <div class="d-flex justify-content-between">
                <p class="mb-2">Total Progress</p>
                <p class="mb-2 text-info">{{ progress }}%</p>
            </div>
            <progress-bar :progress="progress" color="bg-info"></progress-bar>
        </div>
    </status-card>
</template>

<script>
    import StatusCard from "../common/StatusCard";
    import ProgressBar from "../common/ProgressBar";
    export default {
        name: "ProjectStatusCard",
        components: {ProgressBar, StatusCard},
        props: ['status', 'progress']
    }
</script>