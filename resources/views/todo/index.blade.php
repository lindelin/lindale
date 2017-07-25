@extends('layouts.master')

@section('title')
    TODO - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.todo.top-panel')
    @include('layouts.common.message')

    @component('components.grids.12-6-4-3')

        @slot('side')
            {{-- 标题部分 --}}
            @include('layouts.todo.my-todo.title')
            {{-- 列表部分 --}}
            @include('layouts.todo.my-todo.list')
        @endslot

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @foreach( $todos as $todo)
                    @include('layouts.todo.my-todo.todo')
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                {{ $todos->links() }}
            </div>
        </div>
    @endcomponent

@endsection