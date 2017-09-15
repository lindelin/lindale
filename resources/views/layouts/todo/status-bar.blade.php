<div class="well well-home">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            {{ trans('todo.all-todos') }}
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            @include('layouts.common.progress.todo.user-todo-progress')
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            {{ trans('type.public') }}
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            @include('layouts.common.progress.todo.user-todo-type-progress', ['type' => \App\Todo\TodoType::find(config('todo.public'))])
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            {{ trans('type.private') }}
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            @include('layouts.common.progress.todo.user-todo-type-progress', ['type' => \App\Todo\TodoType::find(config('todo.private'))])
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="progress" style="margin-bottom: 0px;">
                <div class="progress-bar
                                    @if($type != null)
                @if((int)$type->id === config('todo.public'))
                        progress-bar-success
                    @elseif((int)$type->id === config('todo.private'))
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
</div>