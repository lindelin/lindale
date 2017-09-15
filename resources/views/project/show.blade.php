@extends('layouts.master')

@section('title')
    {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            @include('layouts.notice.notice')
            @include('layouts.project.tasks')
            @include('layouts.project.activity')
    	</div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            @include('layouts.project.common.project-statuses')
            @include('layouts.project.progress')
            @include('layouts.project.milestone')
            {{--@include('layouts.project.info-well')--}}
            {{--@include('layouts.project.todos')--}}
        </div>
    </div>

@endsection