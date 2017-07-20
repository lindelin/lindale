<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                        <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ trans('header.progress') }}
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: {{ $project->progress }}%">
                                {{ $project->progress }}% Complete
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                        <span class="glyphicon glyphicon-tasks lindale-icon-color"></span> {{ trans('header.tasks') }}
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {{ Calculator::ProjectTaskProgressCompute($project) }}%">
                                {{ Calculator::ProjectTaskProgressCompute($project) }}% Complete
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                        <span class="glyphicon glyphicon-check lindale-icon-color"></span> TODO
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                        <div class="progress" style="margin-bottom: 0px;">
                            <div class="progress-bar progress-bar-striped active"  style="width: {{ Calculator::ProjectTodoProgressCompute($project) }}%">
                                {{ Calculator::ProjectTodoProgressCompute($project) }}% Complete
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>