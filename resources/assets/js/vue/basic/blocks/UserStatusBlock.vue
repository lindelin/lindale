<template>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <project-status-card status="100" progress="60"></project-status-card>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <project-status-card status="100" progress="60"></project-status-card>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <project-status-card status="100" progress="60"></project-status-card>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <project-status-card status="100" progress="60"></project-status-card>
        </div>
    </div>
</template>

<script>
    import ProjectStatusCard from "../../basic/cards/ProjectStatusCard";
    export default {
        name: "UserStatusBlock",
        components: {ProjectStatusCard}
    }
</script>