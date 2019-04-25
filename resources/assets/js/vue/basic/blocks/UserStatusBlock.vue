<template>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <project-status-card status="100" progress="60"></project-status-card>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <task-status-card status="246" progress="75"></task-status-card>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <todo-status-card status="125" progress="30"></todo-status-card>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <star-status-card status="1020"></star-status-card>
        </div>
    </div>
</template>

<script>
    import ProjectStatusCard from "../../basic/cards/ProjectStatusCard";
    import StarStatusCard from "../cards/StarStatusCard";
    import TaskStatusCard from "../cards/TaskStatusCard";
    import TodoStatusCard from "../cards/TodoStatusCard";
    export default {
        name: "UserStatusBlock",
        components: {TodoStatusCard, TaskStatusCard, StarStatusCard, ProjectStatusCard}
    }
</script>