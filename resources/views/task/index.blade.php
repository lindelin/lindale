@extends('layouts.master')

@section('title')
    {{ trans('header.tasks') }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.task.top-panel')
    @include('layouts.common.message')

    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
            <div class="well well-home" style="padding-bottom: 20px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4>進捗</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="progress" style="margin-bottom: 0px;">
                            <div class="progress-bar progress-bar-striped active progress-bar-success"
                                 style="width: {{ \App\Calculator::UserTaskProgressCompute(Auth::user()) }}%">
                                {{ \App\Calculator::UserTaskProgressCompute(Auth::user()) }}% Complete
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
            <div class="well well-home" align="center">
                <clock></clock>
            </div>
        </div>
    </div>

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @foreach($tasks as $task)
                @include('layouts.task.common.task', ['task' => $task])
            @endforeach
    	</div>
    </div>

@endsection