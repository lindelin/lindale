<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-xs-block">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" @if($mode != 'project') class="active" @endif style="width: 50%;"><a href="{{ url('/home') }}"><div align="center">Home</div></a></li>
                <li role="presentation" @if($mode == 'project') class="active" @endif style="width: 50%;"><a href="{{ url('/home/project') }}"><div align="center">Project</div></a></li>
            </ul>
        </div>
    </div>
    <br>

    @if($mode == 'project')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if($myProjects->count() > 0)
                    <div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">
                                    {{ trans('project.projects-manage') }}
                                </div>
                                <!-- List group -->
                                <ul class="list-group">
                                    @foreach($myProjects as $project)
                                        <a href="{{ url("project/$project->id") }}" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> {{ $project->title }}</a>
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
    @else
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                @include('layouts.common.profile-img')
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
               <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                       <h4>{{ Auth::user()->name }}<br> <small>{{ Auth::user()->email }}</small></h4>
                   </div>
                   @if(Auth::user()->github)
                       <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                           <a href="{{ Auth::user()->github }}"><i class="fa fa-github-alt" aria-hidden="true"></i></a>
                       </div>
                   @endif
                   @if(Auth::user()->slack)
                       <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                           <a href="{{ Auth::user()->slack }}"><i class="fa fa-slack" aria-hidden="true"></i></a>
                       </div>
                   @endif
                   @if(Auth::user()->facebook)
                       <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                           <a href="{{ Auth::user()->facebook }}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                       </div>
                   @endif
                   @if(Auth::user()->qq)
                       <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                           <a href="{{ Auth::user()->qq }}"><i class="fa fa-qq" aria-hidden="true"></i></a>
                       </div>
                   @endif
               </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                            <h4><strong>{{ $userProjectCount }}</strong><br> <small>Projects</small></h4>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                            <h4><strong>0</strong><br> <small>Tasks</small></h4>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                            <h4><strong>0</strong><br> <small>TODO</small></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                {{--<div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">My Project</div>
                    <!-- List group -->
                    <ul class="list-group">
                        @foreach($myProjects as $project)
                            <a href="{{ url("project/$project->id") }}" class="list-group-item">{{ $project->title }}</a>
                        @endforeach
                    </ul>
                </div>--}}
            </div>
        </div>
    @endif

</div>