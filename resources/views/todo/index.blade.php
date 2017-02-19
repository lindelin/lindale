@extends('layouts.master')

@section('title')
    TODO - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.todo.top-panel')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            {{-- 标题部分 --}}
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {{--<div class="page-header">
                        <h3><span class="glyphicon glyphicon-check"></span> TODO</h3>
                        <h4>
                            @if($type != null)
                                @if((int)$type->id === Definer::PUBLIC_TODO)
                                    <span class="label label-success">{{ trans('type.public') }}</span>
                                @elseif((int)$type->id === Definer::PRIVATE_TODO)
                                    <span class="label label-warning">{{ trans('type.private') }}</span>
                                @endif
                            @else
                                <span class="label label-primary">{{ trans('todo.all-todos') }}</span>
                            @endif
                        </h4>
                    </div>--}}
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                            	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    {{ trans('todo.all-todos') }}
                            	</div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    {{ trans('type.public') }}
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    {{ trans('type.private') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    @include('layouts.common.progress.todo.user-todo-progress')
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    @include('layouts.common.progress.todo.user-todo-type-progress', ['type' => \App\Todo\TodoType::find(Definer::PUBLIC_TODO)])
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    @include('layouts.common.progress.todo.user-todo-type-progress', ['type' => \App\Todo\TodoType::find(Definer::PRIVATE_TODO)])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar
                        @if($type != null)
                            @if((int)$type->id === Definer::PUBLIC_TODO)
                                progress-bar-success
                            @elseif((int)$type->id === Definer::PRIVATE_TODO)
                                progress-bar-warning
                            @endif
                        @else
                                progress-bar-primary
                        @endif
                        progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: @if($type != null){{ Calculator::UserTodoTypeProgressCompute(Auth::user(), $type) }}@else{{ Calculator::UserTodoProgressCompute(Auth::user()) }}@endif%;">
                            <span>
                                @if($type != null)
                                    {{ Calculator::UserTodoTypeProgressCompute(Auth::user(), $type) }}%
                                @else
                                    {{ Calculator::UserTodoProgressCompute(Auth::user()) }}%
                                @endif
                            </span>
                        </div>
                    </div>
            	</div>
            </div>
            {{-- 列表部分 --}}
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel @if($type != null) @if((int)$type->id === Definer::PUBLIC_TODO) panel-success @elseif((int)$type->id === Definer::PRIVATE_TODO) panel-warning @endif @else panel-primary @endif">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    {{ trans('todo.todo-list') }}
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
                                    @if($type != null)
                                        @if((int)$type->id === Definer::PRIVATE_TODO)
                                            @include('layouts.todo.common.list-edit', ['list_edit_delete_url' => 'todo/type/'.Definer::PRIVATE_TODO.'/list/delete'])
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- List group -->
                        <ul class="list-group">
                            <a href="{{ url("/$prefix") }}" class="list-group-item">
                        <span class="badge">
                            @if($type != null)
                                @include('layouts.common.progress.todo.user-todo-type-progress')
                            @else
                                @include('layouts.common.progress.todo.user-todo-progress')
                            @endif
                        </span>
                                {{ trans('todo.all-todos') }}
                            </a>
                            @foreach($statuses as $status)
                                <a href="{{ url("$prefix/status/$status->id") }}" class="list-group-item">
                                    <span class="badge">
                                        @if($type != null)
                                            @include('layouts.common.progress.todo.user-todo-type-status-progress')
                                        @else
                                            @include('layouts.common.progress.todo.user-todo-status-progress')
                                        @endif
                                    </span>
                                    {{ trans($status->name) }}
                                </a>
                            @endforeach
                            @if($type != null)
                                @if((int)$type->id === Definer::PRIVATE_TODO and $lists->count() > 0)
                                    @foreach($lists as $list)
                                        <a href="{{ url("$prefix/list/show/$list->id") }}" class="list-group-item">
                                            <span class="badge">{{-- TODO: 集計 --}}
                                                {{ $list->Todos()->where('status_id', Definer::FINISH_STATUS_ID)->count() }}/{{ $list->Todos()->count() }}
                                            </span>
                                            {{ $list->title }}
                                        </a>
                                    @endforeach
                                @endif
                            @endif
                            @if(isset($projects) != null)
                                @foreach($projects as $project)
                                    <a href="{{ url("$prefix/project/$project->id") }}" class="list-group-item">
                                        <span class="badge">
                                            @include('layouts.common.progress.todo.user-project-todo-progress')
                                        </span>
                                        {{ $project->title }}
                                    </a>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    @include('layouts.todo.common.add-list', [
                    'add_list_create_url' => url('todo/type/'.Definer::PRIVATE_TODO.'/list/create'),
                    'add_list_store_url'  => url('todo/type/'.Definer::PRIVATE_TODO.'/list'),
                    ])
            	</div>
            </div>
        {{-- 框架结束 --}}
        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">

            @foreach( $todos as $todo)
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel {{ Colorable::panelColorClass($todo->color_id) }}">
                        <div class="panel-heading" role="tab" id="heading{{ $todo->id }}">
                            <div class="row">
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    @include('layouts.todo.common.status-edit', ['status_edit_url' => url("/todo/todo/$todo->id")])
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
                                    @include('layouts.todo.common.private-edit', [
                                    'public_todo_edit_url' => url("/todo/todo/$todo->id"),
                                    'todo_delete_url' => url("/todo/todo/$todo->id"),
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
                                            <th><span class="glyphicon glyphicon-briefcase"></span> {{ trans('header.project') }}</th>
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
                                                @if($todo->Project()->count() > 0){{ $todo->Project->title }}@else{{ trans('project.none') }}@endif
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
        {{-- 框架结束 --}}
    </div>

@endsection