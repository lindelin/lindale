@extends('layouts.home')

@section('title')
    {{ trans('header.project') }} - {{ config('app.title') }}
@endsection

@section('content')
    <project-list></project-list>
@endsection