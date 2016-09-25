@extends('layouts.master')

@section('title')
    Member
@endsection

@section('content')
    <h3>{{ $project->title }} <small>{{ $project->Type->name }}#{{ sprintf("%02d", $project->type_id).$project->user_id.$project->id }}</small></h3>
    @include('layouts.Project.project-nav')
    <br>
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">


            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <h2>{{ trans('header.member') }}</h2>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
                    @include('layouts.member.add')
                </div>
            </div>
            <hr>
            <div class="row">

                {{-- 项目总监 --}}
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <a href="#" class="thumbnail">
                                        <img src="{{ asset('img/admin.png') }}" alt="...">
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h4><a href="#">{{ $pl->name }}</a><br> <small>{{ $pl->email }}</small></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <span class="glyphicon glyphicon-briefcase"></span> 10
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <span class="glyphicon glyphicon-tasks"></span> 10
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <span class="glyphicon glyphicon-check"></span> 10
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" style="{{ Colorable::lindale() }}">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    项目总监
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 panel-title" align="right">
                                    <a href="#"><span class="glyphicon glyphicon-envelope"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($sl)
                    {{-- 项目副总监 --}}
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <a href="#" class="thumbnail">
                                            <img src="{{ asset('img/admin.png') }}" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <h4><a href="#">{{ $sl->name }}</a><br> <small>{{ $sl->email }}</small></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <span class="glyphicon glyphicon-briefcase"></span> 10
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <span class="glyphicon glyphicon-tasks"></span> 10
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <span class="glyphicon glyphicon-check"></span> 10
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer" style="{{ Colorable::lindale() }}">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        项目副总监
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 panel-title" align="right">
                                        <a href="#"><span class="glyphicon glyphicon-envelope"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            	@foreach($pms as $pm)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <a href="#" class="thumbnail">
                                            <img src="{{ asset('img/admin.png') }}" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    	<div class="row">
                                    		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <h4><a href="#">{{ $pm->name }}</a><br> <small>{{ $pm->email }}</small></h4>
                                    		</div>
                                    	</div>
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <span class="glyphicon glyphicon-briefcase"></span> 10
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <span class="glyphicon glyphicon-tasks"></span> 10
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <span class="glyphicon glyphicon-check"></span> 10
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                加入时间: {{ $pm->pivot->created_at }}
                                        	</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer" style="{{ Colorable::lindale() }}">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        项目成员
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 panel-title" align="right">
                                        <a href="#"><span class="glyphicon glyphicon-flag"></span></a>　
                                        <a href="#"><span class="glyphicon glyphicon-envelope"></span></a>　
                                        <a href="#"><span class="glyphicon glyphicon-log-out"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="list-group">
                <a href="#" class="list-group-item"><span class="badge">1</span> 项目总监</a>
                <a href="#" class="list-group-item"><span class="badge">1</span> 项目副总监</a>
                <a href="#" class="list-group-item"><span class="badge">8</span> 项目主管</a>
                <a href="#" class="list-group-item"><span class="badge">14</span> 项目成员</a>
            </div>
        </div>
    </div>


@endsection
