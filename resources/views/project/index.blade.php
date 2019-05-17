@extends('layouts.project')

@section('title')
    {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('head')
    <meta name="section" content="{{ $section }}">
@stop

@section('content')
    <project-detail></project-detail>
@endsection