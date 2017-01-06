<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: {{ $project->progress }}%">
                {{ $project->progress }}%
            </div>
            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {{ Calculator::ProjectUnfinishedTaskProgressCompute($project) }}%">
                {{ Calculator::ProjectUnfinishedTaskProgressCompute($project) }}%
            </div>
            <div class="progress-bar progress-bar-danger" style="width: {{ Calculator::ProjectUnfinishedTodoProgressCompute($project) }}%">
                {{ Calculator::ProjectUnfinishedTodoProgressCompute($project) }}%
            </div>
        </div>
    </div>
</div>