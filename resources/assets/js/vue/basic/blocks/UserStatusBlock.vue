<template>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <project-status-card :status="status.project_count" :progress="progress.total"></project-status-card>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <task-status-card :status="status.unfinished_task_count" :progress="progress.task"></task-status-card>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <todo-status-card :status="status.unfinished_todo_count" :progress="progress.todo"></todo-status-card>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <star-status-card status="--"></star-status-card>
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
        components: {TodoStatusCard, TaskStatusCard, StarStatusCard, ProjectStatusCard},
        props: ['status', 'progress']
    }
</script>