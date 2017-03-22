<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default" style="box-shadow: none;">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                        <span class="glyphicon glyphicon-tasks lindale-icon-color"></span>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                        <span class="glyphicon glyphicon-check lindale-icon-color"></span>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                        <span class="glyphicon glyphicon-calendar lindale-icon-color"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                        @include('layouts.common.progress.project-task-progress')
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                        @include('layouts.common.progress.project-todo-progress')
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                        0/0
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>