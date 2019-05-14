@extends('layouts.home')

@section('title')
    TODOs - {{ config('app.title') }}
@endsection

@section('content')
    <todo-list></todo-list>
@endsection