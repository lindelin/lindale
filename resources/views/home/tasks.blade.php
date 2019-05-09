@extends('layouts.home')

@section('title')
    {{ trans('header.tasks') }} - {{ config('app.title') }}
@endsection

@section('content')
    <task-list></task-list>
@endsection