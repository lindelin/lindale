@extends('layouts.mails')

@section('title')
    你有一个新的任务
@endsection

@section('content')
    <tr>
        <td>
            <h4 style="color: #ff0000">你有一个新的任务</h4>
        </td>
    </tr>
    <tr>
        <td>
            <a href="{{ url('admin/task/'.$task->id) }}" class="btn-primary">
                <h3>{{ $task->Type->name.'#'.$task->id.'0'.$task->Type->id.'0'.$task->User->id }}: {{ $task->name }}</h3>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <ul>
            <li>{{ trans('task.user') }}: {{ $task->User->name }}</li>
            <li>{{ trans('task.status') }}: {{ $task->Status->name }}</li>
            <li>{{ trans('task.progress') }}: {{ $task->progress }}%</li>
            <li>{{ trans('task.deadline') }}: {{ $task->deadline }}</li>
            <li>{{ trans('task.created_at') }}: {{ $task->created_at }}</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td>
            <p>{{ trans('task.content') }}: {{ $task->content }}</p>
        </td>
    </tr>
@endsection