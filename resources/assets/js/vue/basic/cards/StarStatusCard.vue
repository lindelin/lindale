<template>
    <status-card icon='<i class="mdi mdi-star text-success icon-lg"></i>'
                 title="Stars"
                 :status="status">
        <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
    </status-card>
</template>

<script>
    import StatusCard from "../common/StatusCard";
    export default {
        name: "StarStatusCard",
        components: {StatusCard},
        props: ['status']
    }
</script>