@extends('layouts.master')

@section('title')
    {{ trans('header.tasks') }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.task.top-panel')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @foreach($tasks as $task)
                @include('layouts.task.common.task', ['task' => $task])
            @endforeach
    	</div>
    </div>

@endsection