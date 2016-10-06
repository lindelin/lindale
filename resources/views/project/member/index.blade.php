@extends('layouts.master')

@section('title')
    Member
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">


            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h2>{{ trans('header.member') }}</h2>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align="right">
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
                                    @include('layouts.common.user-img', ['user_img' => $pl])
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
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <span class="glyphicon glyphicon-time"></span> {{ $project->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" style="{{ Colorable::lindale() }}">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <span class="glyphicon glyphicon-king"></span> 项目总监
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panel-title" align="right">
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
                                        @include('layouts.common.user-img', ['user_img' => $sl])
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
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <span class="glyphicon glyphicon-time"></span> {{ $project->created_at }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer" style="{{ Colorable::lindale() }}">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <span class="glyphicon glyphicon-queen"></span> 项目副总监
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panel-title" align="right">
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
                                        @include('layouts.common.user-img', ['user_img' => $pm])
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
                                                <span class="glyphicon glyphicon-time"></span> {{ $pm->pivot->created_at }}
                                        	</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer" style="{{ Colorable::lindale() }}">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        @if($pm->pivot->is_admin === 1000)
                                            <span class="glyphicon glyphicon-bishop"></span> 项目主管
                                        @else
                                            <span class="glyphicon glyphicon-pawn"></span> 项目成员
                                        @endif
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panel-title" align="right">
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
                <a href="#" class="list-group-item"><span class="badge">{{ $allCount }}</span> 全部成员</a>
                <a href="#" class="list-group-item"><span class="badge">1</span> 项目总监</a>
                <a href="#" class="list-group-item"><span class="badge">{{ $slCount }}</span> 项目副总监</a>
                <a href="#" class="list-group-item"><span class="badge">0</span> 项目主管</a>
                <a href="#" class="list-group-item"><span class="badge">{{ $pmCount }}</span> 项目成员</a>
            </div>
        </div>
    </div>


@endsection
