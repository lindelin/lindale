@extends('layouts.master')

@section('title')
    {{ trans('header.achievement') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    @include('layouts.achievement.title')

@endsection
