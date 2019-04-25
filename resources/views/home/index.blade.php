@extends('layouts.home')

@section('title')
    {{ trans('header.home') }} - {{ config('app.title') }}
@endsection

@section('content')
    <home-dashboard-status-bar></home-dashboard-status-bar>
@endsection