<template>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card" v-for="task in tasks">
            <user-task-card :task="task"></user-task-card>
        </div>
    </div>
</template>

<script>
    import UserTaskCard from "../../basic/cards/UserTaskCard";
    export default {
        name: "TaskList",
        components: {UserTaskCard},
        data: function () {
            return {
                tasks: [],
            }
        },
        created: function () {
            this.loadData();
        },
        methods: {
            loadData: function () {
                axios.get('/api/tasks')
                    .then(response => {
                        this.tasks = response.data.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
</script>