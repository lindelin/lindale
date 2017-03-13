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
                    <div class="well well-home" align="center">
                        <clock></clock>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @include('layouts.todo.status-bar')
            	</div>
            </div>
            {{-- 列表部分 --}}
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well well-home">
                        @if($type != null)
                            @if((int)$type->id === Definer::PUBLIC_TODO)
                                <h4 class="lindale-color">{{ trans('todo.todo-list') }}（{{ trans('type.public') }}）</h4>
                            @elseif((int)$type->id === Definer::PRIVATE_TODO)
                                <h4 class="lindale-color">{{ trans('todo.todo-list') }}（{{ trans('type.private') }}）</h4>
                            @endif
                        @else
                            <h4 class="lindale-color">{{ trans('todo.todo-list') }}（{{ trans('todo.all-todos') }}）</h4>
                            <hr>
                        @endif
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
                                    <table class="table table-hover table-bordered lindale-table">
                                        <thead>
                                        <tr>
                                            <th><span class="glyphicon glyphicon-user lindale-icon-color"></span> {{ trans('todo.user') }}</th>
                                            <th><span class="glyphicon glyphicon-tag lindale-icon-color"></span> {{ trans('todo.type') }}</th>
                                            <th><span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ trans('todo.status') }}</th>
                                            <th><span class="glyphicon glyphicon-briefcase lindale-icon-color"></span> {{ trans('header.project') }}</th>
                                            <th><span class="glyphicon glyphicon-list-alt lindale-icon-color"></span> {{ trans('todo.todo-list') }}</th>
                                            <th><i class="fa fa-refresh fa-spin fa-fw lindale-icon-color"></i> {{trans('todo.updated')}}</th>
                                            <th><span class="glyphicon glyphicon-time lindale-icon-color"></span> {{trans('todo.created')}}</th>
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