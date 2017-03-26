@extends('layouts.master')

@section('title')
    TODO - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">


            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h3 class="lindale-color">
                        <span class="glyphicon glyphicon-check lindale-icon-color"></span>
                        TODO
                    </h3>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align="right">
                    @include('layouts.todo.add')
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @foreach( $todos as $todo)
                        @include('layouts.todo.common.project-todo')
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                    {{ $todos->links() }}
                </div>
            </div>

        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 lindale-color">
                                    {{ trans('todo.todo-list') }}
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
                                    @include('layouts.todo.common.list-edit', ['list_edit_delete_url' => "project/$project->id/todo/list/delete"])
                                </div>
                            </div>
                        </div>

                        <!-- List group -->
                        <ul class="list-group">
                            <a href="{{ url("/project/$project->id/todo") }}" class="list-group-item">
                        <span class="badge">
                            {{ Counter::ProjectTodoFinishedCount($project) }}/{{ Counter::ProjectTodoCount($project) }}
                        </span>
                                {{ trans('todo.all-todos') }}
                            </a>
                            @foreach($statuses as $status)
                                <a href="{{ url("/project/$project->id/todo/status/$status->id") }}" class="list-group-item">
                            <span class="badge">
                                @include('layouts.common.progress.todo.project-todo-status-progress')
                            </span>
                                    {{ trans($status->name) }}
                                </a>
                            @endforeach
                            @if($lists->count() > 0)
                                @foreach($lists as $list)
                                    <a href="{{ url("/project/$project->id/todo/list/show/$list->id") }}" class="list-group-item">
                                <span class="badge">
                                    @include('layouts.common.progress.todo.project-todo-list-progress')
                                </span>
                                        {{ $list->title }}
                                    </a>
                                @endforeach
                            @endif
                        </ul>
                    </div>
            	</div>
            </div>

            @include('layouts.todo.common.add-list', [
            'add_list_create_url' => url("project/$project->id/todo/list/create"),
            'add_list_store_url'  => url("project/$project->id/todo/list"),
            ])

        </div>
    </div>




@endsection