<div class="jumbotron">
    <div class="row">
    	<div class="col-xs-6 col-sm-6 col-md-10 col-lg-10">
            @include('layouts.admin.task.edit')
    	</div>
        <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
            <form action="{{ url('admin/task/'.$task->id) }}" method="POST" style="display: inline;">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> {{ trans('admin.delete') }}</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
            <h4>{{ trans('task.user') }}:</h4>
        </div>
        <div class="col-xs-6 col-sm-7 col-md-8 col-lg-9">
            <h4>{{ $task->User->name }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
            <h4>{{ trans('task.type') }}:</h4>
        </div>
        <div class="col-xs-6 col-sm-7 col-md-8 col-lg-9">
            <h4>{{ $task->Type->name }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
            <h4>{{ trans('task.status') }}:</h4>
        </div>
        <div class="col-xs-6 col-sm-7 col-md-8 col-lg-9">
            <h4>{{ $task->Status->name }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
            <h4>{{ trans('task.deadline') }}:</h4>
        </div>
        <div class="col-xs-6 col-sm-7 col-md-8 col-lg-9">
            <h4>{{ $task->deadline }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
            <h4>{{ trans('task.updated_at') }}:</h4>
        </div>
        <div class="col-xs-6 col-sm-7 col-md-8 col-lg-9">
            <h4>{{ $task->updated_at }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
            <h4>{{ trans('task.created_at') }}:</h4>
        </div>
        <div class="col-xs-6 col-sm-7 col-md-8 col-lg-9">
            <h4>{{ $task->created_at }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
            <h4>{{ trans('task.content') }}:</h4>
        </div>
        <div class="col-xs-6 col-sm-7 col-md-8 col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ $task->content }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <br>
            <div class="progress" style="margin-bottom: 0px;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: {{ $task->progress }}%">{{ $task->progress }}%</div>
            </div>
        </div>
    </div>
</div>