@extends('layouts.master')

@section('title')
    {{ trans('header.tasks') }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.task.top-panel')
    @include('layouts.common.message')

    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
            @include('layouts.task.my-task.progress')
        </div>
        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
            @include('layouts.task.my-task.clock')
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