<div class="well well-home">
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
            <h4 class="lindale-icon-color">
                <span class="glyphicon glyphicon-briefcase"></span>
                <a href="{{ url('project/'.$project->id) }}" class="lindale-color">
                    {{ str_limit($project->title, 16) }}
                </a>
            </h4>
        </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" align="right">

            @if($project->progress === 100)
                <h4>
                    <a href="#" class="dropdown-toggle panel-title my-tooltip" title="完了" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-ok"></span>
                    </a>
                </h4>
            @else
                <h4>
                    <a href="#" class="dropdown-toggle panel-title my-tooltip" title="進行中" data-toggle="dropdown">
                        <i class="fa fa-circle-o-notch fa-spin fa-lg fa-fw"></i>
                    </a>
                </h4>
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            @include('layouts.common.project-img')
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <p>
                <span class="glyphicon glyphicon-king lindale-icon-color"></span>
                {{ str_limit($project->ProjectLeader->name, 10) }}
            </p>
            @if($project->SubLeader)
                <p>
                    <span class="glyphicon glyphicon-queen lindale-icon-color"></span>
                    {{ str_limit($project->SubLeader->name, 10) }}
                </p>
            @endif
            <p>
                <span class="glyphicon glyphicon-tasks lindale-icon-color"></span>
                @include('layouts.common.progress.project-task-progress')
            </p>
            <p>
                <span class="glyphicon glyphicon-check lindale-icon-color"></span>
                @include('layouts.common.progress.project-todo-progress')
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('layouts.common.number.project')
            　<span class="label label-danger">{{ $project->Status->name }}</span>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="progress" style="margin-bottom: 0px;">
                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width: {{ $project->progress }}%;">
                    <span>{{ $project->progress }}%</span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p>
                <i class="fa fa-refresh fa-spin fa-lg fa-fw lindale-icon-color"></i>
                {{ trans('task.updated') }}：{{ $project->updated_at->diffForHumans() }}
            </p>
        </div>
    </div>
</div>