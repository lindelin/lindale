@extends('layouts.master')

@section('title')
    TODO - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.todo.top-panel')
    @include('layouts.common.message')
    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            {{-- 标题部分 --}}
            @include('layouts.todo.my-todo.title')
            {{-- 列表部分 --}}
            @include('layouts.todo.my-todo.list')
        {{-- 框架结束 --}}
        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">

            @foreach( $todos as $todo)
                @include('layouts.todo.my-todo.todo')
            @endforeach
            {{ $todos->links() }}

        </div>
        {{-- 框架结束 --}}
    </div>

@endsection