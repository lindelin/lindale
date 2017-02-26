<!-- 模态窗按钮 -->
<a href="#editSubTaskModel{{ $model->id }}" class="my-tooltip" title="{{ trans('task.edit') }}" data-toggle="modal" data-target="#editSubTaskModel{{ $model->id }}">
    @if($model->is_finish === Definer::TASK_FINISHED)
        <span class="glyphicon glyphicon-ok"></span>
    @else
        <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
    @endif
</a>

<!-- 模态窗 -->
<div class="modal fade" id="editSubTaskModel{{ $model->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="left" style="color: #000000">
                    {{ trans('task.sub-task') }} #{{ $model->id }}
                </h4>
            </div>
            <form action="{{ $status_edit_url }}" method="POST" style="display: inline;">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="modal-body" align="left" style="color: #000000">

                    <div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h4>
                                @if($model->is_finish === Definer::TASK_FINISHED)
                                    {{ trans('task.status') }}:{{ trans('task.finish') }}
                                    <span class="glyphicon glyphicon-ok"></span>
                                @else
                                    {{ trans('task.status') }}:{{ trans('task.unfinished') }}
                                    <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
                                @endif
                            </h4>
                    	</div>
                    </div>

                    {{-- 状态 --}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('is_finish') ? ' has-error' : '' }}">
                                <div>
                                    <select class="selectpicker form-control" name="is_finish" @if($task->is_finish === Definer::TASK_FINISHED) disabled @endif>
                                        <option value="1" @if($model->is_finish === Definer::TASK_FINISHED) selected @endif>{{ trans('task.finish') }}</option>
                                        <option value="0" @if($model->is_finish === Definer::TASK_UNFINISHED) selected @endif>{{ trans('task.unfinished') }}</option>
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'is_finish'])
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- 附属任务 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.sub-task') }}
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="content" value="{{ old('content') ? old('content') : $model->content }}"
                                           @if($model->is_finish === Definer::TASK_FINISHED) disabled @endif>
                                    @include('layouts.common.error-one', ['field' => 'content'])
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($model->Task->is_finish === \App\Definer::TASK_UNFINISHED)
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span> {{ trans('task.cancel') }}
                                </button>
                                <button type="submit" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-edit"></span> {{ trans('task.edit') }}
                                </button>
                            </div>
                        </div>
                    @endif

                </div>
            </form>

            <div class="modal-footer" style="color: #000000">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="{{ $status_edit_url }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-block" @if($task->is_finish === Definer::TASK_FINISHED) disabled @endif>
                                <span class="glyphicon glyphicon-trash"></span> {{ trans('task.delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
