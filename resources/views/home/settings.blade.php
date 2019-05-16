@extends('layouts.settings')

@section('title')
    {{ trans('header.settings') }} - {{ config('app.title') }}
@endsection

@section('content')

    <profile-settings></profile-settings>
@endsection