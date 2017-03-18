@if($myProjects->count() > 0)
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h3><small> {{ trans('project.projects-manage') }}</small></h3>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
            <h3>
                <small>
                    <a href="{{ $myProjects->previousPageUrl() }}">
                        <i class="fa fa-chevron-circle-left fa-lg lindale-icon-color" aria-hidden="true"></i>
                    </a>
                    　{{ $myProjects->currentPage() }}　
                    <a href="{{ $myProjects->nextPageUrl() }}">
                        <i class="fa fa-chevron-circle-right fa-lg lindale-icon-color" aria-hidden="true"></i>
                    </a>
                </small>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                @foreach($myProjects as $project)

                    <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                        <div class="bs-callout home-project-card {{ Colorable::randomCallOutColor() }}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <a href="{{ url("project/$project->id") }}">
                                        <h4>
                                            {{ str_limit($project->title, 30) }}
                                        </h4>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <strong><a href="{{ url("project/$project->id") }}" class="{{ Colorable::randomTextColor() }}">@include('layouts.common.number.project')</a></strong>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <strong>
                                        <span class="glyphicon glyphicon-tasks lindale-icon-color"></span> @include('layouts.common.progress.project-task-progress')&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon glyphicon-check lindale-icon-color"></span> @include('layouts.common.progress.project-todo-progress')&nbsp;&nbsp;&nbsp;
                                        {{--<span class="glyphicon glyphicon-calendar"></span> 0/0&nbsp;&nbsp;&nbsp;--}}
                                        <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ $project->progress }}%&nbsp;&nbsp;&nbsp;
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@if($userProjects->count() > 0)
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h3><small> {{ trans('project.projects-join') }}</small></h3>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
            <h3>
                <small>
                    <a href="{{ $userProjects->previousPageUrl() }}" >
                        <i class="fa fa-chevron-circle-left fa-lg lindale-icon-color" aria-hidden="true"></i>
                    </a>　{{ $userProjects->currentPage() }}　
                    <a href="{{ $userProjects->nextPageUrl() }}">
                        <i class="fa fa-chevron-circle-right fa-lg lindale-icon-color" aria-hidden="true"></i>
                    </a>
                </small>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                @foreach($userProjects as $project)
                    <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                        <div class="bs-callout home-project-card {{ Colorable::randomCallOutColor() }}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <a href="{{ url("project/$project->id") }}">
                                        <h4>
                                            {{ str_limit($project->title, 30) }}
                                        </h4>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <strong>
                                        <a href="{{ url("project/$project->id") }}" class="{{ Colorable::randomTextColor() }}">
                                            @include('layouts.common.number.project')
                                        </a>
                                    </strong>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <strong>
                                        <span class="glyphicon glyphicon-tasks lindale-icon-color"></span> @include('layouts.common.progress.project-task-progress')&nbsp;&nbsp;&nbsp;
                                        <span class="glyphicon glyphicon-check lindale-icon-color"></span> @include('layouts.common.progress.project-todo-progress')&nbsp;&nbsp;&nbsp;
                                        {{--<span class="glyphicon glyphicon-calendar"></span> 0/0&nbsp;&nbsp;&nbsp;--}}
                                        <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ $project->progress }}%&nbsp;&nbsp;&nbsp;
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif