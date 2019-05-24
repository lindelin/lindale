<script>
    export default {
        name: "Router",
        data: function () {
            return {
                route: {
                    top: '/',
                    login: '/login',
                    profile: '/api/profile',
                    tasks: '/api/tasks',
                    todos: '/api/todos',
                    projects: {
                        managed: '/api/v1/projects/managed',
                        store: '/api/projects'
                    }
                }
            }
        }
    }
</script>