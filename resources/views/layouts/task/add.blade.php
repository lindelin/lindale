<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
        <!-- 模态窗按钮 -->
        <button type="button" class="btn btn-link my-tooltip" title="{{ trans('task.submit') }}" data-toggle="modal" data-target="#addTodo">
            <h4 class="text-success"><span class="glyphicon glyphicon-plus"></span></h4>
        </button>

        <!-- 模态窗 -->
        <div class="modal fade" id="addTodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel" align="left">{{ trans('task.submit') }}</h4>
                    </div>
                    <div class="modal-body" align="center">
                        <a href="{{ url('project/'.$project->id.'/task/group/create') }}" class="btn btn-info btn-lg btn-block">
                            <span class="glyphicon glyphicon-th-list"></span> {{ trans('task.new-group') }}
                        </a>
                        <br>
                        <a href="{{ url('project/'.$project->id.'/task/task/create') }}" class="btn btn-success btn-warning btn-lg btn-block">
                            <span class="glyphicon glyphicon-tasks"></span> {{ trans('task.new-task') }}
                        </a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> {{ trans('task.cancel') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>