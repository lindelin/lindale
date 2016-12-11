@extends('layouts.master')

@section('title')
    {{ trans('header.tasks') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
            @include('layouts.task.common.delete', ['model' => $task, 'status_edit_url' => url('project/'.$project->id.'/task/task/'.$task->id) ])&nbsp;&nbsp;
            <a href="#" class="text-warning"><span class="glyphicon glyphicon-edit"></span> {{ trans('task.edit') }}</a>&nbsp;&nbsp;
            <a href="#" class="text-success"><span class="glyphicon glyphicon-plus"></span> {{ trans('task.add-sub') }}</a>
    	</div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	@include('layouts.task.common.task', ['task' => $task])
        </div>
    </div>

@endsection