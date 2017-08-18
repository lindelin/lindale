@if($project->Todos()->count() > 0)
    @component('components.well')
        @slot('title')
            <span class="glyphicon glyphicon-check lindale-icon-color"></span> TODO
        @endslot
        @component('components.elements.table')
            <thead>
                <tr>
                    <th>{{ trans('todo.content') }}</th>
                    <th>{{ trans('todo.user') }}</th>
                    <th>{{ trans('todo.initiator') }}</th>
                    <th>{{ trans('task.status') }}</th>
                </tr>
            </thead>
            @slot('tbody')
                @foreach($project->latestTodo(5) as $todo)
                    <tr>
                        <td>{{ $todo->content }}</td>
                        <td>{{ $todo->User ? $todo->User->name : trans('project.none') }}</td>
                        <td>{{ $todo->Initiator ? $todo->Initiator->name : trans('project.none') }}</td>
                        <td>
                            @if($todo->status_id === config('todo.status.finished'))
                                <span class="glyphicon glyphicon-ok-circle text-success"></span>
                            @else
                                <span class="glyphicon glyphicon-remove-circle text-danger"></span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    @endcomponent
@endif