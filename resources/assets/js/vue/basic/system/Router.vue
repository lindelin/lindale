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
                        joined: '/api/v1/projects/joined',
                        store: '/api/projects'
                    },
                    todo: {
                        update: function (id) {
                            return '/api/todos/' + id
                        },
                        editResources: function (id) {
                            return '/api/todos/' + id + '/edit-resource'
                        }
                    }
                }
            }
        }
    }
</script>