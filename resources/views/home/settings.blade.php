@extends('layouts.settings')

@section('title')
    {{ trans('header.settings') }} - {{ config('app.title') }}
@endsection

@section('head')
    <meta name="section" content="{{ $section }}">
@stop

@section('content')
    <profile-settings></profile-settings>
@endsection