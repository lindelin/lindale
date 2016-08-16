@extends('layouts.admin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ '#'.$task->id.'0'.$task->Type->id.'0'.$task->User->id }}
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    	<h4>{{ $task->Type->name.'#'.$task->id.'0'.$task->Type->id.'0'.$task->User->id }}
                            <span class="label label-info">{{ $task->Status->name }}</span></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                        <h3>{{ $task->name }}</h3>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif
                        @include('layouts.admin.task.status')
                    </div>
                </div>
                <div class="row">
                	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        @include('layouts.admin.task.comments')
                	</div>
                </div>
            </div>
        </div>
    </div>
@endsection