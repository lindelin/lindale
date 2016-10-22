<!-- 模态窗按钮 -->
<h4 class="panel-title">
    <a class="my-tooltip" title="{{ trans('todo.status-now') }}:{{ trans($todo->Status->name) }}" data-toggle="modal" data-target="#editTodoStatus{{ $todo->id }}">
        {!! Definer::getStatusAction($todo->Status->action_id) !!}
    </a>
</h4>

<!-- 模态窗 -->
<div class="modal fade" id="editTodoStatus{{ $todo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="left" style="color: #000000">{{ trans('todo.status') }}</h4>
            </div>
            <form action="{{ url("project/$project->id/todo/todo/$todo->id") }}" method="POST" style="display: inline;">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="modal-body" align="left" style="color: #000000">

                    <div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    		<h4>
                                {{ trans('todo.status-now') }}：{{ trans($todo->Status->name) }}
                                {!! Definer::getStatusAction($todo->Status->action_id) !!}
                            </h4>
                    	</div>
                    </div>

                    {{-- 状态 --}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                                <div>
                                    <select class="selectpicker form-control" name="status_id">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" @if($todo->status_id === $status->id) selected @endif>{{ trans($status->name) }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'status_id'])
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            <div class="modal-footer" style="color: #000000">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> {{ trans('todo.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-edit"></span> {{ trans('todo.edit') }}
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>