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
                        <h4 class="modal-title lindale-color" id="myModalLabel" align="left">
                            {{ trans('task.submit') }}
                        </h4>
                    </div>
                    <div class="modal-body" align="center">
                        <a href="{{ url('project/'.$project->id.'/task/group/create') }}" class="btn btn-default btn-lg btn-block">
                            <h4 class="lindale-color"><span class="glyphicon glyphicon-th-list lindale-icon-color"></span> {{ trans('task.new-group') }}</h4>
                        </a>
                        <br>
                        <a href="{{ url('project/'.$project->id.'/task/task/create') }}" class="btn btn-default btn-lg btn-block">
                            <h4 class="lindale-color"><span class="glyphicon glyphicon-tasks lindale-icon-color"></span> {{ trans('task.new-task') }}</h4>
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