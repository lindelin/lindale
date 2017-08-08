@extends('layouts.master')

@section('title')
    {{ trans('header.progress') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    @include('layouts.progress.title')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {!! Graphs::todoOverviewBar($project)->render() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {!! Graphs::todoProgressAreaspline($project)->render() !!}
        </div>
    </div>

    <div class="page-header">
        <h3>To-dos
            <small>List</small>
        </h3>
    </div>

    @if($todos->count() > 0)
            @component('components.panels.default')
                @component('components.elements.table')
                    <thead>
                        <tr>
                            <th>{{ trans('todo.content') }}</th>
                            <th>{{ trans('todo.user') }}</th>
                            <th>{{ trans('todo.initiator') }}</th>
                            <th>{{ trans('todo.created') }}</th>
                            <th>{{ trans('task.status') }}</th>
                        </tr>
                    </thead>
                    @slot('tbody')
                        @if($todos->count() > 0)
                            @foreach($todos as $todo)
                                <tr>
                                    <td>{{ $todo->content }}</td>
                                    <td>{{ $todo->User ? $todo->User->name : trans('project.none') }}</td>
                                    <td>{{ $todo->Initiator ? $todo->Initiator->name : trans('project.none') }}</td>
                                    <td>{{ $todo->created_at->format('Y/m/d') }}</td>
                                    <td>
                                        @if($todo->status_id === config('todo.status.finished'))
                                            <span class="glyphicon glyphicon-ok-circle text-success"></span>
                                        @else
                                            <span class="glyphicon glyphicon-remove-circle text-danger"></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endslot
                @endcomponent
            @endcomponent
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
            {{ $todos->links() }}
        </div>
    </div>

@endsection
