@extends('layouts.mails')

@section('title')
    {{ $sender->name }}更新了这个任务
@endsection

@section('content')
    <tr>
        <td>
            <h4 style="color: #ff0000">{{ $sender->name }}更新了这个任务</h4>
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
    <tr>
        <td>
            <p>{{ trans('task.logs') }}:</p>
        </td>
    </tr>
    @foreach ($task->Comments as $comment)
        <tr>
            <td>
                <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
                    <div class="nickname" data="{{ $comment->User->name }}">
                        <h4>{{ $comment->User->name }}</h4>
                        <h6>{{ trans('task.created_at') }}: {{ $comment->created_at }}</h6>
                    </div>
                    <div class="content">
                        <p style="padding: 20px;">
                            {!! nl2br(e($comment->content)) !!}
                        </p>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach

@endsection