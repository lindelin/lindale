@extends('layouts.master')

@section('title')
    TODO - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">


            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h2>TODO</h2>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align="right">
                    @include('layouts.todo.add')
                </div>
            </div>
            <hr>
            @foreach( $todos as $todo)
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    
                    <div class="panel {{ Colorable::panelColorClass($todo->color_id) }}">
                        <div class="panel-heading" role="tab" id="heading{{ $todo->id }}">
                            <div class="row">
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    @include('layouts.todo.common.status-edit', ['status_edit_url' => url("project/$project->id/todo/todo/$todo->id")])
                                </div>
                                <div class="col-xs-8 col-sm-9 col-md-9 col-lg-10">
                                    <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $todo->id }}" aria-expanded="false" aria-controls="collapse{{ $todo->id }}">
                                        <div style="width:100%;height:17px;overflow: hidden">
                                            {{ $todo->content }}
                                        </div>
                                    </a>
                                    </h4>
                                </div>
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    @include('layouts.todo.common.public-edit', [
                                    'public_todo_edit_url' => url("project/$project->id/todo/todo/$todo->id"),
                                    'todo_delete_url' => url("project/$project->id/todo/todo/$todo->id"),
                                    ])
                                </div>
                            </div>
                        </div>
                        <div id="collapse{{ $todo->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $todo->id }}">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th><span class="glyphicon glyphicon-user"></span> {{ trans('todo.user') }}</th>
                                            <th><span class="glyphicon glyphicon-tag"></span> {{ trans('todo.type') }}</th>
                                            <th><span class="glyphicon glyphicon-dashboard"></span> {{ trans('todo.status') }}</th>
                                            <th><span class="glyphicon glyphicon-list-alt"></span> {{ trans('todo.todo-list') }}</th>
                                            <th><i class="fa fa-refresh fa-spin fa-fw"></i> {{trans('todo.updated')}}</th>
                                            <th><span class="glyphicon glyphicon-time"></span> {{trans('todo.created')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @if($todo->User != null){{ $todo->User->name }}@else{{ trans('project.none') }}@endif
                                                </td>
                                                <td>
                                                   {!! Colorable::label($todo->Type->color_id, trans($todo->Type->name)) !!}
                                                </td>
                                                <td>
                                                    {!! Colorable::label($todo->Status->color_id, trans($todo->Status->name)) !!}
                                                </td>
                                                <td>
                                                    @if($todo->TodoList != null){{ $todo->TodoList->title }}@else{{ trans('project.none') }}@endif
                                                </td>
                                                <td>
                                                    {{ $todo->updated_at }}
                                                </td>
                                                <td>
                                                    {{ $todo->created_at }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        {{ $todo->content }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
            {{ $todos->links() }}

        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading" style="{{ Colorable::lindale() }}">
                    <div class="row">
                    	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
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
                            @include('layouts.common.progress.project-todo-progress')
                        </span>
                        {{ trans('todo.all-todos') }}
                    </a>
                    @foreach($statuses as $status)
                        <a href="{{ url("/project/$project->id/todo/status/$status->id") }}" class="list-group-item">
                            <span class="badge">@include('layouts.common.progress.todo.project-todo-status-progress')</span>
                            {{ trans($status->name) }}
                        </a>
                    @endforeach
                    @if($lists->count() > 0)
                        @foreach($lists as $list)
                            <a href="{{ url("/project/$project->id/todo/list/show/$list->id") }}" class="list-group-item">
                                <span class="badge">@include('layouts.common.progress.todo.project-todo-list-progress')</span>
                                {{ $list->title }}
                            </a>
                        @endforeach
                    @endif
                </ul>
            </div>

            @include('layouts.todo.common.add-list', [
            'add_list_create_url' => url("project/$project->id/todo/list/create"),
            'add_list_store_url'  => url("project/$project->id/todo/list"),
            ])

        </div>
    </div>




@endsection