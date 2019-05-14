<template>
    <div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card" v-for="todo in todos" @click="openTodoDetailModal(todo)">
                <user-todo-card :todo="todo"></user-todo-card>
            </div>
        </div>
        <div class="modal fade" id="todoDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content" v-if="detail">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><div class="d-flex">
                            <span class="font-weight-semibold mr-2 mb-0 no-wrap">TODO :</span>
                            <span class="mr-1 mb-0 d-none d-sm-block"
                                :class="textColor(detail.color)">
                                [#{{ detail.id }}]
                            </span>
                            <span class="mb-0">{{ detail.content }}</span>
                        </div></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr class="text-gray">
                                            <th>
                                                {{ trans.get('todo.initiator') }}
                                            </th>
                                            <th>
                                                {{ trans.get('todo.status') }}
                                            </th>
                                            <th>
                                                {{ trans.get('todo.todo-list') }}
                                            </th>
                                            <th>
                                                {{ trans.get('todo.user') }}
                                            </th>
                                            <th>
                                                {{ trans.get('todo.updated') }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{ detail.initiator.name }}
                                            </td>
                                            <td class="text-danger">
                                                {{ detail.status }}
                                            </td>
                                            <td class="font-weight-medium">
                                                {{ detail.list_name }}
                                            </td>
                                            <td>
                                                {{ detail.user.name }}
                                            </td>
                                            <td>
                                                {{ detail.updated_at }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="jumbotron jumbotron-fluid">
                                    <div class="container" v-html="detail.details"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UserTodoCard from "../../basic/cards/UserTodoCard";
    import Colors from "../../basic/common/Colors";
    export default {
        mixins: [Colors],
        name: "TodoList",
        components: {UserTodoCard},
        data: function () {
            return {
                todos: [],
                detail: null
            }
        },
        created: function () {
            this.loadData();
        },
        updated: function () {
            this.$root.hideLoader();
        },
        methods: {
            loadData: function () {
                axios.get('/api/todos')
                    .then(response => {
                        this.todos = response.data.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            openTodoDetailModal: function (todo) {
                this.detail = todo;
                $('#todoDetailModal').modal('show');
            }
        }
    }
</script>