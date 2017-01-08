<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">

                        <a href="{{ url('task') }}" class="btn  btn-xs btn-primary">{{ trans('task.all') }}</a>
                        <a href="{{ url('task/unfinished/') }}" class="btn  btn-xs btn-warning">{{ trans('task.unfinished') }}</a>
                        <a href="{{ url('task/finished') }}" class="btn  btn-xs btn-success">{{ trans('task.finish') }}</a>

                    </div>

                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 hidden-xs">
                        <div class="progress" style="margin-bottom: 0px;">
                            <div class="progress-bar progress-bar-striped active progress-bar-success"
                                 style="width: {{ \App\Calculator::UserTaskProgressCompute(Auth::user()) }}%">
                                {{ \App\Calculator::UserTaskProgressCompute(Auth::user()) }}% Complete
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default visible-xs-block">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="progress" style="margin-bottom: 0px;">
                            <div class="progress-bar progress-bar-striped active progress-bar-success"
                                 style="width: {{ \App\Calculator::UserTaskProgressCompute(Auth::user()) }}%">
                                {{ \App\Calculator::UserTaskProgressCompute(Auth::user()) }}% Complete
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>