@extends('layouts.master')

@section('title')
    {{ trans('header.member') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">


            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h3><span class="glyphicon glyphicon-user"></span> {{ trans('header.member') }}</h3>
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
                        <div class="panel-body member-card-body">
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
                        <div class="panel-footer member-card-footer" style="{{ Colorable::lindale() }}">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <span class="glyphicon glyphicon-king"></span> {{ trans('member.pl') }}
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panel-title" align="right">
                                    <a href="#" class="my-tooltip" title="{{ trans('member.message') }}">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($sl)
                    {{-- 项目副总监 --}}
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body member-card-body">
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
                            <div class="panel-footer member-card-footer" style="{{ Colorable::lindale() }}">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <span class="glyphicon glyphicon-queen"></span> {{ trans('member.sl') }}
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panel-title" align="right">
                                        <a href="#" class="my-tooltip" title="{{ trans('member.message') }}">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            	@foreach($pms as $pm)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body member-card-body">
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
                            <div class="panel-footer member-card-footer" style="{{ Colorable::lindale() }}">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        @if($pm->pivot->is_admin === Definer::PROJECT_ADMIN)
                                            <span class="glyphicon glyphicon-bishop"></span> {{ trans_choice('member.pa', 1) }}
                                        @else
                                            <span class="glyphicon glyphicon-pawn"></span> {{ trans_choice('member.pm', 1) }}
                                        @endif
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panel-title" align="right">
                                        @include('layouts.member.policy', ['member' => $pm])　
                                        <a href="#" class="my-tooltip" title="{{ trans('member.message') }}">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </a>　
                                        @include('layouts.member.delete', ['remove_member' => $pm])
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
                <a href="#" class="list-group-item"><span class="badge">{{ $allCount }}</span> {{ trans('member.all-members') }}</a>
                <a href="#" class="list-group-item"><span class="badge">1</span> {{ trans('member.pl') }}</a>
                <a href="#" class="list-group-item"><span class="badge">{{ $slCount }}</span> {{ trans('member.sl') }}</a>
                <a href="#" class="list-group-item"><span class="badge">{{ $paCount }}</span> {{ trans_choice('member.pa', $paCount) }}</a>
                <a href="#" class="list-group-item"><span class="badge">{{ $pmCount }}</span> {{ trans_choice('member.pm', $pmCount) }}</a>
            </div>
        </div>
    </div>


@endsection
