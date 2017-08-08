@extends('layouts.master')

@section('title')
    {{ trans('header.progress') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    @include('layouts.progress.title')

    @component('components.grids.12-12-7-7')

        {!! Graphs::taskTypePie($project)->render() !!}

        @slot('side')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {!! Graphs::taskOverviewBar($project)->render() !!}
                </div>
            </div>
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {!! Graphs::taskProgressAreaspline($project)->render() !!}
        </div>
    </div>

    <div class="page-header">
        <h3>{{ trans('header.tasks') }}
            <small>List</small>
        </h3>
    </div>

    @if($taskGroups->count() > 0)
        @foreach($taskGroups as $taskGroup)
            @component('components.well', ['title' => $taskGroup->title])
                @component('components.elements.table')
                    <thead>
                        <tr>
                            <th>{{ trans('task.task-title') }}</th>
                            <th>{{ trans('task.type') }}</th>
                            <th>{{ trans('task.user') }}</th>
                            <th>{{ trans('todo.initiator') }}</th>
                            <th>{{ trans('task.start_at') }}</th>
                            <th>{{ trans('task.end_at') }}</th>
                            <th>{{ trans('task.progress') }}</th>
                            <th>{{ trans('task.status') }}</th>
                        </tr>
                    </thead>
                    @slot('tbody')
                        @if($taskGroup->Tasks()->count() > 0)
                            @foreach($taskGroup->Tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{!! Colorable::label($task->Type->color_id, trans($task->Type->name)) !!}</td>
                                    <td>{{ $task->User ? $task->User->name : trans('project.none') }}</td>
                                    <td>{{ $task->Initiator ? $task->Initiator->name : trans('project.none') }}</td>
                                    <td>{{ $task->start_at ? $task->start_at->format('Y/m/d') : trans('project.none') }}</td>
                                    <td>{{ $task->end_at ? $task->end_at->format('Y/m/d') : trans('project.none') }}</td>
                                    <td>
                                        <div class="progress" style="margin-bottom: 0;">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $task->progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task->progress }}%">
                                                <span>{{ $task->progress }}% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($task->is_finish === config('task.finished'))
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
        @endforeach
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
            {{ $taskGroups->links() }}
        </div>
    </div>

@endsection
