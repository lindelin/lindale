@extends('layouts.master')

@section('title')
    Project
@endsection

@section('content')

    @include('layouts.Project.top-panel')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
        @foreach( $projects as $project)
            <style rel="stylesheet" type="text/css">
                #colorable-{{ $project->id }}{
                    {{ Colorable::lindale() }}
                }
            </style>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading" id="colorable-{{ $project->id }}">
                        <div class="row">
                        	<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="overflow: hidden; height: 20px; ">
                                <h7 class="panel-title"><a href="{{ url('project/'.$project->id) }}">{{ $project->title }}</a></h7>
                        	</div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" align="right">
                                <div class="dropdown">
                                        <a href="#" class="dropdown-toggle panel-title my-tooltip" title="進行中..." data-toggle="dropdown">
                                            <i class="fa fa-cog fa-spin fa-lg fa-fw"></i>
                                        </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('lang', ['lang' => 'en']) }}">English</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('lang', ['lang' => 'ja']) }}">日本語</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('lang', ['lang' => 'zh']) }}">中文</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 400px">
                                <div class="row">
                                	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        @if($project->image)
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 project-panel-img">
                                                <a href="{{ url('project/'.$project->id) }}" class="thumbnail">
                                                    <img src="{{ asset('storage/'.$project->image) }}" alt="...">
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 project-panel" id="colorable-{{ $project->id }}">
                                                <h4 class="panel-title"><a href="{{ url('project/'.$project->id) }}">{{ $project->title }}</a></h4>
                                            </div>
                                        @endif
                                	</div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        {{ $project->Type->name }}#{{ sprintf("%02d", $project->type_id).$project->user_id.$project->id }}
                                        　<span class="label label-danger">{{ $project->Status->name }}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="progress" style="margin-bottom: 0px;">
                                            <div class="progress-bar progress-bar-success" role="progressbar" style="width: {{ $project->progress + 30 }}%;">
                                                {{ $project->progress + 30 }}%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <p><span class="glyphicon glyphicon-user"></span> PL {{ $project->ProjectLeader->name }}</p>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <p>
                                            @if($project->SubLeader)
                                                <span class="glyphicon glyphicon-user"></span> SL {{ $project->SubLeader->name }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <p><span class="glyphicon glyphicon-tasks"></span> 10/100 Taskes</p>
                                	</div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <p><span class="glyphicon glyphicon-check"></span> 10 To-do</p>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <p><span class="glyphicon glyphicon-time"></span> {{ $project->updated_at }}</p>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection