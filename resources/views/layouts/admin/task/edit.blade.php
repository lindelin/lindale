<div class="row">
    <div class="col-md-12">
        {{-- 动态窗 START --}}
        <div align="right">
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-edit"></span>
                {{ trans('task.edit') }}
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-circle"></span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('task.edit-task') }}</h4>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/task/'.$task->id) }}">
                        {{ method_field('PATCH') }}
                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">

                                    {{-- 任务 --}}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">{{ trans('task.name') }}</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" value="{{ $task->name }}" readonly>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- 类型 --}}
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('task.type') }}</label>

                                        <div class="col-md-6">
                                            <select class="selectpicker form-control" name="type">
                                                <option value="{{ $task->Type->id }}">{{ $task->Type->name }}</option>
                                                @foreach( $types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- 负责人 --}}
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('task.user') }}</label>

                                        <div class="col-md-6">
                                            <select class="selectpicker form-control" name="user">
                                                <option value="{{ $task->User->id }}">{{ $task->User->name }}</option>
                                                @foreach( $users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- 状态 --}}
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('task.status') }}</label>

                                        <div class="col-md-6">
                                            <select class="selectpicker form-control" name="status">
                                                <option value="{{ $task->Status->id }}">{{ $task->Status->name }}</option>
                                                @foreach( $statuses as $status)
                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- 进度 --}}
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('task.progress') }}</label>

                                        <div class="col-md-6">
                                            <select class="selectpicker form-control" name="progress">
                                                <option value="{{ $task->progress }}">{{ $task->progress }}%</option>
                                                <option value="10">10%</option>
                                                <option value="20">20%</option>
                                                <option value="30">30%</option>
                                                <option value="40">40%</option>
                                                <option value="50">50%</option>
                                                <option value="60">60%</option>
                                                <option value="70">70%</option>
                                                <option value="80">80%</option>
                                                <option value="90">90%</option>
                                                <option value="100">100%</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- 内容 --}}
                                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">{{ trans('task.content') }}</label>

                                        <div class="col-md-6">
                                            <textarea class="form-control" name="content" value="{{ old('content') }}">{{ $task->content }}</textarea>

                                            @if ($errors->has('content'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('content') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span>
                                {{ trans('admin.close') }}
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>
                                <span class="glyphicon glyphicon-ok"></span>
                                {{ trans('admin.edit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- 动态窗 END ----}}
    </div>
</div>