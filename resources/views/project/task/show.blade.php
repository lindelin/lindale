@extends('layouts.master')

@section('title')
    {{ trans('header.tasks') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
            @include('layouts.task.common.delete', [
            'model' => $task,
            'delete_url' => url('project/'.$project->id.'/task/task/'.$task->id),
            'link_name' => '<span class="glyphicon glyphicon glyphicon-trash"></span> '.trans('task.delete'),
            'model_id' => 'deleteTask'.$task->id,
            'model_name' => $task->title,
            ])&nbsp;&nbsp;
            <a href="{{ url('project/'.$project->id.'/task/task/edit/'.$task->id) }}" class="text-warning"><span class="glyphicon glyphicon-edit"></span> {{ trans('task.edit') }}</a>&nbsp;&nbsp;
            @include('layouts.task.sub-task.add')
    	</div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	@include('layouts.task.common.task', ['task' => $task])
        </div>
    </div>

    @if($subTask->count() > 0)
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h3><small> {{ trans('task.sub-task') }}</small></h3>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
                <h3>
                    <small>
                        <a href="{{ $subTask->previousPageUrl() }}" ><i class="fa fa-chevron-circle-left fa-lg" aria-hidden="true"></i></a>
                        　{{ $subTask->currentPage() }}　
                        <a href="{{ $subTask->nextPageUrl() }}"><i class="fa fa-chevron-circle-right fa-lg" aria-hidden="true"></i></a>
                    </small>
                </h3>
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @foreach($subTask as $sub)
                    <table class="bs-callout {{ Colorable::getCallOutColor($task->color_id) }} table table-bordered table-hover">
                        <tr>
                            <td width="10%">
                                @include('layouts.task.common.sub-task-finish-edit',
                                ['status_edit_url' => url('project/'.$project->id.'/task/show/'.$task->id.'/sub-task/edit/'.$sub->id), 'model' => $sub])
                            </td>
                            @if($sub->is_finish === Definer::TASK_FINISHED)
                                <td>
                                    <del>{{ $sub->content }}</del>
                                </td>
                            @else
                                <td>
                                    {{ $sub->content }}
                                </td>
                            @endif
                        </tr>
                    </table>
                @endforeach
        	</div>
        </div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="page-header">
                <h3><small>{{ trans('task.group-info') }}</small></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jumbotron">
                {!! Markdown::toHtml($task->content) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="page-header">
                <h3><small>{{ trans('task.activity') }}</small></h3>
            </div>
        </div>
    </div>
    @if($activities->count() > 0)
        @foreach($activities as $activity)
            <div class="row">
                <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                    @include('layouts.common.user-img', ['user_img' => $activity->User])
                </div>
                <div class="col-xs-9 col-sm-10 col-md-11 col-lg-11">
                    <div class="panel panel-default">
                        <div class="arrow"></div>
                        <div class="panel-heading">
                            <strong class="panel-title"><a href="#">{{ $activity->User->name }}</a></strong>&nbsp;&nbsp;
                            @include('layouts.task.common.delete', [
                            'model' => $activity,
                            'delete_url' => url('project/'.$project->id.'/task/show/'.$task->id.'/activity/'.$activity->id),
                            'link_name' => $activity->updated_at,
                            'model_id' => 'deleteActivity'.$activity->id,
                            'model_name' => trans('task.comment'),
                            ])
                        </div>
                        <div class="panel-body">
                            {!! Markdown::toHtml($activity->content) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                {{ $activities->links() }}
        	</div>
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            <strong>Warning!</strong> {{ trans('task.no-comment') }}
        </div>
    @endif
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('task.add-comment') }}</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
                            @include('layouts.common.profile-img')
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form action="{{ url('project/'.$project->id.'/task/show/'.$task->id.'/activity') }}" method="post" role="form" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                            <div>
                                                <textarea class="form-control" rows="8" name="content" data-provide="markdown" placeholder=" Markdown">{{ old('content') }}</textarea>
                                                @include('layouts.common.error-one', ['field' => 'content'])
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">{{ trans('task.comment') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection