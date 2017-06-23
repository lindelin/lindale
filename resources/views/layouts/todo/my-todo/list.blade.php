<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-home">
            @if($type != null)
                @if((int)$type->id === config('todo.public'))
                    <h4 class="lindale-color">{{ trans('todo.todo-list') }}（{{ trans('type.public') }}）</h4>
                    <hr>
                @elseif((int)$type->id === config('todo.private'))
                    <h4 class="lindale-color">{{ trans('todo.todo-list') }}（{{ trans('type.private') }}）</h4>
                    @include('layouts.todo.common.list-edit', ['list_edit_delete_url' => 'todo/type/'.config('todo.private').'/list/delete'])
                    <hr>
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
                    @if((int)$type->id === config('todo.private') and $lists->count() > 0)
                        @foreach($lists as $list)
                            <a href="{{ url("$prefix/list/show/$list->id") }}" class="list-group-item">
                                            <span class="badge">{{-- TODO: 集計 --}}
                                                {{ $list->Todos()->where('status_id', config('todo.status.finished'))->count() }}/{{ $list->Todos()->count() }}
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
        'add_list_create_url' => url('todo/type/'.config('todo.private').'/list/create'),
        'add_list_store_url'  => url('todo/type/'.config('todo.private').'/list'),
        ])
    </div>
</div>