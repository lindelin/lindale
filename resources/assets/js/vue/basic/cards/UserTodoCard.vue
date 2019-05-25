<template>
    <div class="card" v-if="todo">
        <div class="card-body">
            <div class="row">
                <div class="col-md-1 d-flex align-items-center"
                     :class="textColor(todo.color)">
                    <icon :icon="statusIcon" size="2x" :spin="!todo.completed"></icon>
                </div>
                <div class="col-md-11">
                    <div class="row ticket-card">
                        <div class="ticket-details clickable col-md-9" @click="openDetail">
                            <div class="d-flex">
                                <h4 class="font-weight-semibold mr-2 mb-0 no-wrap">TODO :</h4>
                                <h4 class="mr-1 mb-0 d-none d-sm-block"
                                    :class="textColor(todo.color)">
                                    [#{{ todo.id }}]
                                </h4>
                                <h4 class="mb-0 ellipsis">{{ todo.content }}</h4>
                            </div>
                            <h5 class="text-gray ellipsis mb-0">
                                {{ todo.project_name }}
                            </h5>
                        </div>
                        <div class="col-md-3" align="right">
                            <div class="btn-group todo-actions">
                                <button type="button"
                                        class="btn dropdown-toggle"
                                        :class="btnColor(todo.color)"
                                        data-toggle="dropdown"
                                        data-display="static"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                    {{ todo.status }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0);" @click="changeStatus(4)">
                                        <i class="fa fa-reply fa-fw"></i>{{ trans.get('status.undetermined') }}
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" @click="changeStatus(2)">
                                        <i class="fa fa-reply fa-fw"></i>{{ trans.get('status.finish') }}
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" @click="changeStatus(3)">
                                        <i class="fa fa-reply fa-fw"></i>{{ trans.get('status.underway') }}
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" @click="changeStatus(1)">
                                        <i class="fa fa-reply fa-fw"></i>{{ trans.get('status.wait') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-check text-success fa-fw"></i>担当者変更</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Colors from "../common/Colors";
    import Router from "../system/Router";
    import ErrorHandler from "../system/ErrorHandler";
    export default {
        mixins: [Colors, Router, ErrorHandler],
        name: "UserTodoCard",
        props: ['todo'],
        methods: {
            openDetail: function () {
                this.$parent.$emit('open-detail', this.todo)
            },
            changeStatus: function (statusId) {
                this.showSyncIndicator();
                axios.put(this.route.todo.update(this.todo.id), {
                    status_id: statusId
                })
                    .then((response) => {
                        this.notify(response.data.messages, 'success');
                        this.todoHasChanged();
                    })
                    .catch((error) => {
                        this.handleErrorStatusCodes(error);
                    });
            },
            todoHasChanged: function () {
                this.$parent.$emit('has-changed')
            }
        },
        computed: {
            statusIcon: function () {
                return this.todo.completed ? 'check' : 'circle-notch'
            }
        }
    }
</script>