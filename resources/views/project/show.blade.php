@extends('layouts.master')

@section('title')
    {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            {{--<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well well-home">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h4>おしらせ</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                2016年10月27日　システムプレビュー版リリースしました！
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well well-home">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h4><i class="fa fa-area-chart lindale-icon-color" aria-hidden="true"></i> {{ trans('progress.status') }}</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                {!! $projectActivity->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                <span class="glyphicon glyphicon-dashboard"></span> {{ trans('header.project').trans('header.progress') }}
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
                                <span class="glyphicon glyphicon-tasks"></span> {{ trans('header.tasks').trans('header.progress') }}
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
                                <span class="glyphicon glyphicon-check"></span> TODO{{ trans('header.progress') }}
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

    	</div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="well well-home">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4><span class="glyphicon glyphicon-info-sign lindale-icon-color"></span> 概要</h4>
                    </div>
                </div>
                <hr>
                @if($project->content)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            {!! markdown($project->content) !!}
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="{{ url('project/'.$project->id.'/edit') }}" class="btn btn-success btn-block">
                                {{ trans('project.edit-project') }}
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>





@endsection