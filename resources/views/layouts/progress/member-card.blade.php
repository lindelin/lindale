<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-home">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-6">
                    <div class="row">
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            @include('layouts.common.user-img', ['user_img' => $user])
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h3>
                                        <strong>{{ $user->name }}</strong>
                                        <br>
                                        <small>{{ $user->email }}</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    {{ Counter::projectTotalCount($project) }} tasks /
                                    <span class="text-success">{{ Counter::memberTotalCount($project, $user) }} +++ </span>/
                                    <span class="text-danger"> {{ Counter::memberTotalFinishedCount($project, $user) }} ---</span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h5>
                                        <i class="fa fa-refresh fa-spin fa-lg fa-fw lindale-icon-color"></i>
                                        {{ trans('task.updated') }}：{{ $user->updated_at->diffForHumans() }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <br>
                            @component('components.progress.basic')
                                @slot('progress')
                                    {{ Calculator::memberProgress($project, $user) }}
                                @endslot
                                @slot('task_progress')
                                    {{ Calculator::memberTaskProgress($project, $user) }}
                                @endslot
                                @slot('todo_progress')
                                    {{ Calculator::memberTodoProgress($project, $user) }}
                                @endslot
                            @endcomponent
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-6">
                    {!! Graphs::memberTaskTypePie($project, $user)->render() !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {!! Graphs::memberProgressAreaspline($project, $user)->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>