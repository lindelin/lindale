<div class="row">
    <div class="col-md-12">
        <br>
        {{-- 动态窗 START --}}
        <div align="right">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus-sign"></span>
                {{ trans('task.new-task') }}
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-circle"></span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('task.new-task') }}</h4>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/task') }}">
                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">

                                    {{-- 任务 --}}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">{{ trans('task.name') }}</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

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
                                                @foreach( $users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- 期限 --}}
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('task.deadline') }}</label>

                                        <div class="col-md-6">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' class="form-control" name="deadline" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepicker1').datetimepicker({
                                                    format: 'YYYY-MM-DD hh:mm:ss'
                                                });
                                            });
                                        </script>
                                    </div>

                                    {{-- 内容 --}}
                                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">{{ trans('task.content') }}</label>

                                        <div class="col-md-6">
                                            <textarea class="form-control" name="content" value="{{ old('content') }}"></textarea>

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
                                {{ trans('admin.add') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- 动态窗 END ----}}
    </div>
</div>