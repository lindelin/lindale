<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($myProjects->count() > 0)
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-primary">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            {{ trans('project.projects-manage') }}
                        </div>
                        <!-- List group -->
                        <ul class="list-group">
                            @foreach($myProjects as $project)
                                <a href="{{ url("project/$project->id") }}" class="list-group-item">
                                    <h4 class="{{ Colorable::randomTextColor() }}"><span class="glyphicon glyphicon-briefcase"></span> {{ $project->title }}</h4>
                                    <p>
                                        <span class="glyphicon glyphicon-tasks"></span> {{ \App\Counter::ProjectTaskFinishedCount($project) }}/{{ \App\Counter::ProjectTaskCount($project) }}&nbsp;&nbsp;&nbsp;
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
                    <a href="{{ $myProjects->previousPageUrl() }}" ><i class="fa fa-chevron-circle-left fa-lg" aria-hidden="true"></i></a>
                    　{{ $myProjects->currentPage() }}　
                    <a href="{{ $myProjects->nextPageUrl() }}"><i class="fa fa-chevron-circle-right fa-lg" aria-hidden="true"></i></a>
                </div>
            </div>
        @endif

        @if($userProjects->count() > 0)
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            {{ trans('project.projects-join') }}
                        </div>
                        <!-- List group -->
                        <ul class="list-group">
                            @foreach($userProjects as $project)
                                <a href="{{ url("project/$project->id") }}" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> {{ $project->title }}</a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                    <a href="{{ $userProjects->previousPageUrl() }}" ><i class="fa fa-chevron-circle-left fa-lg" aria-hidden="true"></i></a>
                    　{{ $userProjects->currentPage() }}　
                    <a href="{{ $userProjects->nextPageUrl() }}"><i class="fa fa-chevron-circle-right fa-lg" aria-hidden="true"></i></a>
                </div>
            </div>
        @endif

    </div>
</div>