@extends('layouts.master')

@section('title')
    {{ trans('header.info') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3 class="lindale-color">
                        <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span>
                        {{ trans('header.progress') }}
                    </h3>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3><small><span class="glyphicon glyphicon-info-sign"></span> {{ trans('progress.schema-info') }}</small></h3>
                    <div class="panel panel-default">
                        <div class="panel-body">

                           {{-- <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    {!! $projectProgressPie->render() !!}
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    {!! $taskProgressPie->render() !!}
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    {!! $todoProgressPie->render() !!}
                                </div>
                            </div>--}}


                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                                    <span class="glyphicon glyphicon-dashboard"></span> {{ trans('header.project').trans('header.progress') }}
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
                                    <span class="glyphicon glyphicon-tasks"></span> {{ trans('header.tasks').trans('header.progress') }}
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
                                    <span class="glyphicon glyphicon-check"></span> TODO{{ trans('header.progress') }}
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

        </div>
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {!! $schemaDonut->render() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! $projectProgressAreaspline->render() !!}
                </div>
            </div>
        </div>
    </div>


    {{--<h3><small><span class="glyphicon glyphicon-dashboard"></span> {{ trans('header.project').trans('header.progress') }}</small></h3>
    <hr>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            {!! $projectProgressPie->render() !!}
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            {!! $projectProgressAreaspline->render() !!}
        </div>
    </div>--}}


    {{--<h3><small><span class="glyphicon glyphicon-dashboard"></span> {{ trans('header.project').trans('header.progress') }}</small></h3>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            @foreach($project->Users as $user)
                <div class="row">
                    <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                        @include('layouts.common.user-img', ['user_img' => $user])
                    </div>
                    <div class="col-xs-9 col-sm-10 col-md-11 col-lg-11">
                        <div class="panel panel-default">
                            <div class="arrow"></div>
                            <div class="panel-heading">
                                <strong class="panel-title"><a href="#">{{ $user->name }}</a></strong>&nbsp;&nbsp;
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                                        <span class="glyphicon glyphicon-tasks"></span> {{ trans('header.tasks').trans('header.progress') }}
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
                                        <span class="glyphicon glyphicon-check"></span> TODO{{ trans('header.progress') }}
                                    </div>
                                    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                                        <div class="progress" style="margin-bottom: 0px;">
                                            <div class="progress-bar progress-bar-danger progress-bar-striped active"  style="width: {{ Calculator::UserTodoProgressCompute($user) }}%">
                                                {{ Calculator::UserTodoProgressCompute($user) }}% Complete
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>--}}




@endsection
