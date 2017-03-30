@extends('layouts.master')

@section('title')
    {{ $user->name }} - {{ config('app.title') }}
@endsection

@section('content')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hidden-xs">
            {{--头像--}}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @include('layouts.common.user-img', ['user_img' => $user])
                </div>
            </div>
            {{--用户名--}}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3 class="lindale-color">{{ $user->name }}<br> <small>{{ $user->email }}</small></h3>
                </div>
            </div>
            {{--自我介绍--}}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($user->content)
                        <div class="panel panel-default" style="box-shadow: none;">
                            <div class="panel-body">
                                {{ $user->content }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            <hr>
            {{--图标--}}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    @if($user->company)
                        <p><i class="fa fa-university lindale-icon-color" aria-hidden="true"></i> {{ $user->company }}</p>
                    @endif
                    @if($user->location)
                        <p><span class="glyphicon glyphicon-globe lindale-icon-color"></span> {{ $user->location }}</p>
                    @endif
                    @if($user->github)
                        <p><i class="fa fa-github-alt lindale-icon-color" aria-hidden="true"></i> <a href="{{ $user->github }}">GitHub</a></p>
                    @endif
                    @if($user->slack)
                        <p><i class="fa fa-slack lindale-icon-color" aria-hidden="true"></i> <a href="{{ $user->slack }}">Slack</a></p>
                    @endif
                    @if($user->facebook)
                        <p><i class="fa fa-facebook-square lindale-icon-color" aria-hidden="true"></i> <a href="{{ $user->facebook }}">Facebook</a></p>
                    @endif
                    @if($user->qq)
                        <p><i class="fa fa-qq lindale-icon-color" aria-hidden="true"></i> {{ $user->qq }}</p>
                    @endif

                </div>
            </div>
        </div>
        {{-- 框架 --}}
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 hidden-xs">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="panel panel-default lindale-background">
                        <div class="panel-body">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                <h4>
                                    <strong>
                                        <a style="color: #000000;">
                                            {{ Counter::UserProjectCount($user) }}
                                        </a>
                                    </strong>
                                    <br>
                                    <small>
                                        {{ trans('header.project') }}
                                    </small>
                                </h4>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                <h4>
                                    <strong>
                                        <a style="color: #000000;">
                                            {{ Counter::UserUnfinishedTaskCount($user) }}
                                        </a>
                                    </strong>
                                    <br>
                                    <small>
                                        {{ trans('header.tasks') }}
                                    </small>
                                </h4>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                <h4>
                                    <strong>
                                        <a style="color: #000000;">
                                            {{ Counter::UserTodoUnfinishedCount($user) }}
                                        </a>
                                    </strong>
                                    <br>
                                    <small>
                                        TODO
                                    </small>
                                </h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well well-home">

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                                <h4 class="lindale-color">
                                    <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span>
                                    {{ trans('header.progress') }}
                                </h4>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                                <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ trans('header.progress') }}
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: {{ Calculator::UserProgress($user) }}%">
                                        {{ Calculator::UserProgress($user) }}% Complete
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
                                    <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {{ Calculator::UserTaskProgressCompute($user) }}%">
                                        {{ Calculator::UserTaskProgressCompute($user) }}% Complete
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
                                    <div class="progress-bar progress-bar-danger progress-bar-striped active"  style="width: {{ Calculator::UserTodoProgressCompute($user) }}%">
                                        {{ Calculator::UserTodoProgressCompute($user) }}% Complete
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well well-home">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                                <h4 class="lindale-color">
                                    <i class="fa fa-area-chart lindale-icon-color" aria-hidden="true"></i>
                                    {{ trans('progress.status') }}
                                </h4>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                {!! $userProgressAreaspline->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- 手机对应视图 --}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-xs-block">
            <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    @include('layouts.common.user-img', ['user_img' => $user])
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h4>{{ $user->name }}<br> <small>{{ $user->email }}</small></h4>
                        </div>
                        @if($user->github)
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <a href="{{ $user->github }}"><i class="fa fa-github-alt" aria-hidden="true"></i></a>
                            </div>
                        @endif
                        @if($user->slack)
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <a href="{{ $user->slack }}"><i class="fa fa-slack" aria-hidden="true"></i></a>
                            </div>
                        @endif
                        @if($user->facebook)
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <a href="{{ $user->facebook }}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            </div>
                        @endif
                        @if($user->qq)
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <a href="{{ $user->qq }}"><i class="fa fa-qq" aria-hidden="true"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="panel panel-default lindale-background">
                        <div class="panel-body">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                <h4>
                                    <strong>
                                        <a style="color: #000000;">
                                            {{ Counter::UserProjectCount($user) }}
                                        </a>
                                    </strong>
                                    <br>
                                    <small>
                                        {{ trans('header.project') }}
                                    </small>
                                </h4>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                <h4>
                                    <strong>
                                        <a style="color: #000000;">
                                            {{ Counter::UserUnfinishedTaskCount($user) }}
                                        </a>
                                    </strong>
                                    <br>
                                    <small>
                                        {{ trans('header.tasks') }}
                                    </small>
                                </h4>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                <h4>
                                    <strong>
                                        <a style="color: #000000;">
                                            {{ Counter::UserTodoUnfinishedCount($user) }}
                                        </a>
                                    </strong>
                                    <br>
                                    <small>
                                        TODO
                                    </small>
                                </h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well well-home">

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                                <h4 class="lindale-color">
                                    <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span>
                                    {{ trans('header.progress') }}
                                </h4>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                                <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ trans('header.progress') }}
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: {{ Calculator::UserProgress($user) }}%">
                                        {{ Calculator::UserProgress($user) }}% Complete
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
                                    <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {{ Calculator::UserTaskProgressCompute($user) }}%">
                                        {{ Calculator::UserTaskProgressCompute($user) }}% Complete
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
                                    <div class="progress-bar progress-bar-danger progress-bar-striped active"  style="width: {{ Calculator::UserTodoProgressCompute($user) }}%">
                                        {{ Calculator::UserTodoProgressCompute($user) }}% Complete
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well well-home">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                                <h4 class="lindale-color">
                                    <i class="fa fa-area-chart lindale-icon-color" aria-hidden="true"></i>
                                    {{ trans('progress.status') }}
                                </h4>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                {!! $userProgressAreaspline->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END --}}

    </div>

@endsection