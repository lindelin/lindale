<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-home">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4><span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ trans('header.progress') }}</h4>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-4 col-lg-4">
                    <span class="glyphicon glyphicon-dashboard"></span> {{ trans('header.project') }}
                </div>
                <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: {{ $project->progress }}%">
                            {{ $project->progress }}% Complete
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-4 col-lg-4">
                    <span class="glyphicon glyphicon-tasks"></span> {{ trans('header.tasks') }}
                </div>
                <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {{ Calculator::ProjectTaskProgressCompute($project) }}%">
                            {{ Calculator::ProjectTaskProgressCompute($project) }}% Complete
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-4 col-lg-4">
                    <span class="glyphicon glyphicon-check"></span> TODO
                </div>
                <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
                    <div class="progress" style="margin-bottom: 0px;">
                        <div class="progress-bar progress-bar-danger progress-bar-striped active"  style="width: {{ Calculator::ProjectTodoProgressCompute($project) }}%">
                            {{ Calculator::ProjectTodoProgressCompute($project) }}% Complete
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>