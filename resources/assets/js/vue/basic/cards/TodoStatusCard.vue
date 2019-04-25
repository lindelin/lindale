<template>
    <status-card icon='<i class="mdi mdi-check-all text-danger icon-lg"></i>'
                 title="TODOs"
                 :status="status">
        <div class="wrapper">
            <div class="d-flex justify-content-between">
                <p class="mb-2">Completed</p>
                <p class="mb-2 text-danger">{{ progress }}%</p>
            </div>
            <div class="progress">
                <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
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
        name: "TodoStatusCard",
        components: {StatusCard},
        props: ['status', 'progress']
    }
</script>