<template>
    <div>
        <transition-group
                name="list"
                tag="div"
                class="row"
                v-bind:css="false"
                v-on:before-enter="beforeEnter"
                v-on:enter="enter"
                v-on:after-enter="afterEnter">
            <div class="col-md-12 grid-margin stretch-card"
                 v-for="(todo, index) in todos"
                 :key="todo.id"
                 :data-delay="setDelay(index, prePage)"
                 :data-last="index === (todos.length - 1)"
                 @click="openTodoDetailModal(todo)">
                <user-todo-card :todo="todo"></user-todo-card>
            </div>
        </transition-group>
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
        <scroll-loader :loader-method="loadMoreData" :loader-enable="loaderEnable" loader-color="#09b4f7"></scroll-loader>
    </div>
</template>

<script>
    import UserTodoCard from "../../basic/cards/UserTodoCard";
    import Colors from "../../basic/common/Colors";
    import ListAnimation from "../../basic/animations/ListAnimation";
    import Router from "../../basic/system/Router";
    import ErrorHandler from "../../basic/system/ErrorHandler";
    export default {
        mixins: [Colors, ListAnimation, Router, ErrorHandler],
        name: "TodoList",
        components: {UserTodoCard},
        data: function () {
            return {
                todos: [],
                nextTodos: null,
                prePage: null,
                loaderEnable: false,
                detail: null
            }
        },
        created: function () {
            this.loadData();
        },
        updated: function () {
            this.$root.hideLoader();
        },
        mounted: function () {
            this.$on('animation', this.afterAnimation)
        },
        methods: {
            loadData: function () {
                axios.get(this.route.todos)
                    .then(response => {
                        this.todos = response.data.data;
                        this.nextTodos = response.data.links.next;
                        this.prePage = response.data.meta.per_page;
                        this.loaderEnable = this.canLoadMore
                    })
                    .catch(error => {
                        this.handleErrorStatusCodes(error);
                    });
            },
            loadMoreData: function () {
                if (this.canLoadMore) {
                    this.showSyncIndicator();
                    this.loaderEnable = false;
                    axios.get(this.nextTodos)
                        .then(response => {
                            this.todos = this.todos.concat(response.data.data);
                            this.nextTodos = response.data.links.next;
                            this.loaderEnable = this.canLoadMore
                        })
                        .catch(error => {
                            this.handleErrorStatusCodes(error);
                        });
                }
            },
            openTodoDetailModal: function (todo) {
                this.detail = todo;
                $('#todoDetailModal').modal('show');
            },
            afterAnimation: function () {
                this.hideIndicator();
            }
        },
        computed: {
            canLoadMore: function () {
                return this.nextTodos !== null;
            }
        }
    }
</script>