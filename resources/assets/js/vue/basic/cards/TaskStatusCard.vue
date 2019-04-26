<template>
    <status-card icon='<i class="mdi mdi-file-tree text-warning icon-lg"></i>'
                 title="Tasks"
                 :status="status">
        <div class="wrapper">
            <div class="d-flex justify-content-between">
                <p class="mb-2">Task Progress</p>
                <p class="mb-2 text-warning">{{ progress }}%</p>
            </div>
            <progress-bar :progress="progress" color="bg-warning"></progress-bar>
        </div>
    </status-card>
</template>

<script>
    import StatusCard from "../common/StatusCard";
    import ProgressBar from "../common/ProgressBar";
    export default {
        name: "TaskStatusCard",
        components: {ProgressBar, StatusCard},
        props: ['status', 'progress']
    }
</script>