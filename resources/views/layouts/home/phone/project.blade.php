<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($myProjects->count() > 0)
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <h4 class="lindale-color">{{ trans('project.projects-manage') }}</h4>
                        </div>
                        <!-- List group -->
                        <ul class="list-group">
                            @foreach($myProjects as $project)
                                <a href="{{ url("project/$project->id") }}" class="list-group-item">
                                    <h4 class="{{ Colorable::randomTextColor() }}"><span class="glyphicon glyphicon-briefcase"></span> {{ $project->title }}</h4>
                                    <p>
                                        <span class="glyphicon glyphicon-tasks"></span> {{ Counter::ProjectTaskFinishedCount($project) }}/{{ Counter::ProjectTaskCount($project) }}&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon glyphicon-check"></span> {{ Counter::ProjectTodoFinishedCount($project) }}/{{ Counter::ProjectTodoCount($project) }}&nbsp;&nbsp;&nbsp;
                                        {{--<span class="glyphicon glyphicon-calendar"></span> 0/0&nbsp;&nbsp;&nbsp;--}}
                                        <span class="glyphicon glyphicon-dashboard"></span> {{ $project->progress }}%&nbsp;&nbsp;&nbsp;
                                    </p>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                    <a href="{{ $myProjects->previousPageUrl() }}">
                        <i class="fa fa-chevron-circle-left fa-lg lindale-icon-color" aria-hidden="true"></i>
                    </a>
                    　{{ $myProjects->currentPage() }}/{{ $myProjects->lastPage() }}　
                    <a href="{{ $myProjects->nextPageUrl() }}">
                        <i class="fa fa-chevron-circle-right fa-lg lindale-icon-color" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        @endif
        <br>
        @if($userProjects->count() > 0)
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <h4 class="lindale-color">{{ trans('project.projects-join') }}</h4>
                        </div>
                        <!-- List group -->
                        <ul class="list-group">
                            @foreach($userProjects as $project)
                                <a href="{{ url("project/$project->id") }}" class="list-group-item">
                                    <h4 class="{{ Colorable::randomTextColor() }}"><span class="glyphicon glyphicon-briefcase"></span> {{ $project->title }}</h4>
                                    <p>
                                        <span class="glyphicon glyphicon-tasks"></span> {{ Counter::ProjectTaskFinishedCount($project) }}/{{ Counter::ProjectTaskCount($project) }}&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon glyphicon-check"></span> {{ Counter::ProjectTodoFinishedCount($project) }}/{{ Counter::ProjectTodoCount($project) }}&nbsp;&nbsp;&nbsp;
                                        {{--<span class="glyphicon glyphicon-calendar"></span> 0/0&nbsp;&nbsp;&nbsp;--}}
                                        <span class="glyphicon glyphicon-dashboard"></span> {{ $project->progress }}%&nbsp;&nbsp;&nbsp;
                                    </p>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                    <a href="{{ $userProjects->previousPageUrl() }}"><i class="fa fa-chevron-circle-left fa-lg lindale-icon-color" aria-hidden="true"></i></a>
                    　{{ $userProjects->currentPage() }}/{{ $userProjects->lastPage() }}　
                    <a href="{{ $userProjects->nextPageUrl() }}"><i class="fa fa-chevron-circle-right fa-lg lindale-icon-color" aria-hidden="true"></i></a>
                </div>
            </div>
        @endif

    </div>
</div>