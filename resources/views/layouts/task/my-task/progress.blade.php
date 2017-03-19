<div class="well well-home" style="padding-bottom: 20px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h4>進捗</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="progress" style="margin-bottom: 0px;">
                <div class="progress-bar progress-bar-striped active progress-bar-success"
                     style="width: {{ \App\Calculator::UserTaskProgressCompute(Auth::user()) }}%">
                    {{ \App\Calculator::UserTaskProgressCompute(Auth::user()) }}% Complete
                </div>
            </div>
        </div>
    </div>
</div>