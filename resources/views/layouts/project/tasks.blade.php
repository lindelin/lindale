@if($project->Tasks()->count() > 0)
    @component('components.well')
        @slot('title')
            <span class="glyphicon glyphicon-tasks lindale-icon-color"></span> {{ trans('header.tasks') }}
        @endslot
        @component('components.elements.table')
            <thead>
            <tr>
                <th>{{ trans('task.task-title') }}</th>
                <th>{{ trans('task.type') }}</th>
                <th>{{ trans('task.user') }}</th>
                <th>{{ trans('task.start_at') }}</th>
                <th>{{ trans('task.end_at') }}</th>
                <th>{{ trans('task.progress') }}</th>
            </tr>
            </thead>
            @slot('tbody')
                @foreach($project->latestTask(5) as $task)
                    <tr>
                        <td><a href="{{ route('task.show', compact('project', 'task')) }}">{{ $task->title }}</a></td>
                        <td>{!! Colorable::label($task->Type->color_id, trans($task->Type->name)) !!}</td>
                        <td>{{ $task->User ? $task->User->name : trans('project.none') }}</td>
                        <td>{{ $task->start_at ? $task->start_at->format('Y/m/d') : trans('project.none') }}</td>
                        <td>{{ $task->end_at ? $task->end_at->format('Y/m/d') : trans('project.none') }}</td>
                        <td>
                            <div class="progress" style="margin-bottom: 0;">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $task->progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task->progress }}%">
                                    <span>{{ $task->progress }}% Complete</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    @endcomponent
@endif