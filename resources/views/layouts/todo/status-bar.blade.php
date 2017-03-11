<div class="well well-home">
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
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="progress" style="margin-bottom: 0px;">
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
</div>