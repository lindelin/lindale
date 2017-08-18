<!-- 模态窗按钮 -->
<a href="#addSubTask" class="text-success" data-toggle="modal" data-target="#addSubTask">
    <span class="glyphicon glyphicon-plus"></span> {{ trans('task.add-sub') }}
</a>

<!-- 模态窗 -->
<div class="modal fade" id="addSubTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="left" style="color: #000000">
                    {{ trans('task.add-sub') }}
                </h4>
            </div>
            <form action="{{ url('project/'.$project->id.'/task/show/'.$task->id.'/sub-task/') }}" method="POST" style="display: inline;">
                {{ csrf_field() }}

                <div class="modal-body" align="left" style="color: #000000">

                    <div class="row">
                        {{-- 附属任务 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('contents') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.sub-task') }} 1
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="contents[]" value="{{ old('contents') }}">
                                    @include('layouts.common.error-one', ['field' => 'contents'])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- 附属任务 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('contents') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.sub-task') }} 2
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="contents[]" value="{{ old('contents') }}">
                                    @include('layouts.common.error-one', ['field' => 'contents'])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- 附属任务 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('contents') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.sub-task') }} 3
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="contents[]" value="{{ old('contents') }}">
                                    @include('layouts.common.error-one', ['field' => 'contents'])
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer" style="color: #000000">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> {{ trans('task.cancel') }}
                            </button>
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-edit"></span> {{ trans('task.submit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>