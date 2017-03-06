@extends('layouts.master')

@section('title')
    {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="{{ Colorable::lindale() }}">
                            <h5 class="panel-title">おしらせ</h5>
                        </div>
                        <div class="panel-body">
                            2016年10月27日　システムプレビュー版リリースしました！
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="{{ Colorable::lindale() }}">
                            <h5 class="panel-title">{{ trans('task.activity') }}</h5>
                        </div>
                        <div class="panel-body">
                            {!! $projectActivity->render() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="{{ Colorable::lindale() }}">
                            <h5 class="panel-title">{{ trans('header.progress') }}</h5>
                        </div>
                        <div class="panel-body">
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
                                        <div class="progress-bar progress-bar-danger progress-bar-striped active"  style="width: {{ Calculator::ProjectTodoProgressCompute($project) }}%">
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
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading" style="{{ Colorable::lindale() }}">
                    <h5 class="panel-title">概要</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
                            @include('layouts.common.project-img')
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            {!! Markdown::toHtml($project->content) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="panel panel-default">
                <div class="panel-heading" style="{{ Colorable::lindale() }}">
                    <h5 class="panel-title">ログ</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="#" class="thumbnail">
                                <img src="{{ asset('storage/'.$project->image) }}" alt="...">
                            </a>

                            {!! Markdown::toHtml($project->content) !!}
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>





@endsection