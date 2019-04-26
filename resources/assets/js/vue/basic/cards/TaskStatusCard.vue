<template>
    <status-card icon='<i class="mdi mdi-file-tree text-warning icon-lg"></i>'
                 title="Tasks"
                 :status="status">
        <div class="wrapper">
            <div class="d-flex justify-content-between">
                <p class="mb-2">Task Progress</p>
                <p class="mb-2 text-warning">{{ progress }}%</p>
            </div>
            <div class="progress">
                <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                     role="progressbar"
                     :style="{width: progress + '%'}"
                     :aria-valuenow="progress"
                     aria-valuemin="0"
                     aria-valuemax="100"></div>
            </div>
        </div>
    </status-card>
</template>

<script>
    import StatusCard from "../common/StatusCard";
    export default {
        name: "TaskStatusCard",
        components: {StatusCard},
        props: ['status', 'progress']
    }
</script>