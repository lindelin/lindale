<div class="well well-home" style="padding-bottom: 20px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h4 class="lindale-color">
                {{ Counter::UserTaskCount(Auth::user()) }}　{{ trans('header.tasks') }}
                （{{ Counter::UserFinishedTaskCount(Auth::user())}} - {{ trans('task.finish') }}, {{ Counter::UserUnfinishedTaskCount(Auth::user())}} - {{ trans('task.unfinished') }}）
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="progress" style="margin-bottom: 0px;">
                <div class="progress-bar progress-bar-striped active progress-bar-success"
                     style="width: {{ Calculator::UserTaskProgressCompute(Auth::user()) }}%">
                    {{ Calculator::UserTaskProgressCompute(Auth::user()) }}% Complete
                </div>
            </div>
        </div>
    </div>
</div>