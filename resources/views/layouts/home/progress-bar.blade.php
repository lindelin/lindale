<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                        <h4>{{ trans('header.my').trans('header.progress') }}</h4>
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                        <span class="glyphicon glyphicon-dashboard"></span> {{ trans('header.progress') }}
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: {{ Calculator::UserProgress(Auth::user()) }}%">
                                {{ Calculator::UserProgress(Auth::user()) }}% Complete
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                        <span class="glyphicon glyphicon-tasks"></span> {{ trans('header.tasks').trans('header.progress') }}
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {{ Calculator::UserTaskProgressCompute(Auth::user()) }}%">
                                {{ Calculator::UserTaskProgressCompute(Auth::user()) }}% Complete
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                        <span class="glyphicon glyphicon-check"></span> TODO{{ trans('header.progress') }}
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                        <div class="progress" style="margin-bottom: 0px;">
                            <div class="progress-bar progress-bar-danger progress-bar-striped active"  style="width: {{ Calculator::UserTodoProgressCompute(Auth::user()) }}%">
                                {{ Calculator::UserTodoProgressCompute(Auth::user()) }}% Complete
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>