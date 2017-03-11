<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="panel panel-default status-panel">
            <div class="panel-body">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                    <h4>
                        <strong>
                            <a href="{{ url('/home/project') }}" style="color: #000000;">
                                {{ $userProjectCount }}
                            </a>
                        </strong>
                        <br>
                        <small>
                            {{ trans('header.project') }}
                        </small>
                    </h4>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                    <h4>
                        <strong>
                            <a href="{{ url('/task') }}" style="color: #000000;">
                                {{ \App\Counter::UserUnfinishedTaskCount(Auth::user()) }}
                            </a>
                        </strong>
                        <br>
                        <small>
                            {{ trans('header.tasks') }}
                        </small>
                    </h4>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                    <h4>
                        <strong>
                            <a href="{{ url('/todo') }}" style="color: #000000;">
                                {{ \App\Counter::UserTodoUnfinishedCount(Auth::user()) }}
                            </a>
                        </strong>
                        <br>
                        <small>
                            TODO
                        </small>
                    </h4>
                </div>
            </div>
        </div>

    </div>
</div>