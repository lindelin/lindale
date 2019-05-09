<template>
    <div class="card">
        <div class="card-body">
            <div class="row ticket-card pb-2 pb-3 ">
                <div class="col-md-1">
                    <img class="img-sm rounded-circle mb-4 mb-md-0" :src="task.initiator.photo" :alt="task.initiator.name">
                </div>
                <div class="col-md-11">
                    <div class="row ticket-card mb-4">
                        <div class="ticket-details col-md-10">
                            <div class="d-flex">
                                <h4 class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">{{ task.initiator.name }} :</h4>
                                <h4 class="text-primary mr-1 mb-0  d-none d-sm-block">[{{ task.type }}#{{ task.id }}]</h4>
                                <h4 class="mb-0 ellipsis">{{ task.title }}</h4>
                            </div>
                            <h5 class="text-gray ellipsis mb-2">
                                {{ task.project_name }}
                            </h5>
                        </div>
                        <div class="ticket-actions col-md-2 d-none d-sm-block" align="right">
                            <div class="btn-group dropdown">
                                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ task.status }}
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-history fa-fw"></i>Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-gray d-md-flex d-none mb-3">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr class="text-gray">
                                        <th>
                                            {{ trans.get('task.group') }}
                                        </th>
                                        <th>
                                            {{ trans.get('task.priority') }}
                                        </th>
                                        <th>
                                            {{ trans.get('task.start_at') }}
                                        </th>
                                        <th>
                                            {{ trans.get('task.end_at') }}
                                        </th>
                                        <th>
                                            {{ trans.get('task.cost') }}
                                        </th>
                                        <th>
                                            {{ trans.get('task.user') }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ task.group }}
                                        </td>
                                        <td class="font-weight-medium">
                                            {{ task.priority }}
                                        </td>
                                        <td>
                                            {{ task.start_at }}
                                        </td>
                                        <td class="text-danger">
                                            {{ task.end_at }}
                                        </td>
                                        <td>
                                            {{ task.cost }} 時間
                                        </td>
                                        <td>
                                            {{ task.user.name }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper">
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">{{ task.sub_task_status }}</p>
                            <p class="mb-2" :class="progressStatusTextColor">{{ task.progress }}%</p>
                        </div>
                        <progress-bar :progress="task.progress" :color="progressStatusColor"></progress-bar>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProgressBar from "../common/ProgressBar";
    export default {
        name: "UserTaskCard",
        components: {ProgressBar},
        props: ['task'],
        methods: {
            showDetail: function (url) {
                window.open(url, '_blank');
            }
        },
        computed: {
            progressStatusColor: function () {
                if (this.task.progress === 100) {
                    return 'bg-success'
                }

                if (this.task.progress < 20) {
                    return 'bg-danger'
                }

                if (this.task.progress < 40) {
                    return 'bg-warning'
                }

                if (this.task.progress < 60) {
                    return 'bg-info'
                }

                if (this.task.progress < 80) {
                    return 'bg-primary'
                }

                return 'bg-primary'
            },
            progressStatusTextColor: function () {
                if (this.task.progress === 100) {
                    return 'text-success'
                }

                if (this.task.progress < 20) {
                    return 'text-danger'
                }

                if (this.task.progress < 40) {
                    return 'text-warning'
                }

                if (this.task.progress < 60) {
                    return 'text-info'
                }

                if (this.task.progress < 80) {
                    return 'text-primary'
                }

                return 'text-primary'
            }
        }
    }
</script>