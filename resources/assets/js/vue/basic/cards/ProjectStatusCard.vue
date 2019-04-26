<template>
    <status-card icon='<i class="mdi mdi-folder-multiple-outline text-info icon-lg"></i>'
                 title="Projects"
                 :status="status">
        <div class="wrapper">
            <div class="d-flex justify-content-between">
                <p class="mb-2">Total Progress</p>
                <p class="mb-2 text-info">{{ progress }}%</p>
            </div>
            <div class="progress">
                <div class="progress-bar bg-info progress-bar-striped progress-bar-animated"
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
        name: "ProjectStatusCard",
        components: {StatusCard},
        props: ['status', 'progress']
    }
</script>