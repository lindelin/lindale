@extends('layouts.master')

@section('title')
    {{ trans('header.info') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">

            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h2>Information</h2>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {!! Markdown::toHtml($project->content) !!}
                </div>
            </div>
            <br>
            <br>
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sub Project</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    <h3>Sub Project List</h3>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>####</th>
                                        <th>####</th>
                                        <th>####</th>
                                        <th>####</th>
                                        <th>####</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>@include('layouts.admin.delete')</td>
                                        </tr>
                                    @endforeach--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            	</div>
            </div>

        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

            <div class="row">
                @if($project->image != '')
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <a href="#" class="thumbnail">
                            <img src="{{ asset('storage/'.$project->image) }}" alt="...">
                        </a>
            	</div>
                @else
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <a href="#" class="thumbnail">
                            <img src="{{ asset('img/plus.png') }}" alt="...">
                        </a>
                    </div>
                @endif
            </div>
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            		<div class="panel panel-default">
            			<div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    <span class="glyphicon glyphicon-tasks"></span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    <span class="glyphicon glyphicon-check"></span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    12
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    3
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                                    6
                                </div>
                            </div>
            			</div>
            		</div>
            	</div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="{{ url('project/'.$project->id.'/edit') }}" class="btn btn-success btn-block">{{ trans('project.edit-project') }}</a>
                </div>
            </div>
            <hr>
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h5><span class="glyphicon glyphicon-king"></span> {{ $pl->name }}</h5>
            	</div>
            </div>
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($sl != null)
                        <h5><span class="glyphicon glyphicon-queen"></span> {{ $sl->name }}</h5>
                    @endif
            	</div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($pmCount !== 0)
                        <h5><span class="glyphicon glyphicon-pawn"></span> {{ $pmCount }}</h5>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($project->start_at)
                        <h5><i class="fa fa-hourglass-start" aria-hidden="true"></i> {{ $project->start_at }}</h5>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($project->end_at)
                        <h5><i class="fa fa-hourglass-end" aria-hidden="true"></i> {{ $project->end_at }}</h5>
                    @endif
                </div>
            </div>
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($project->updated_at)
                        <h5><i class="fa fa-refresh fa-spin fa-fw"></i> {{ $project->updated_at }}</h5>
                    @endif
            	</div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($project->created_at)
                        <h5><span class="glyphicon glyphicon-time"></span> {{ $project->created_at }}</h5>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" style="width: 35%">
                            35%
                        </div>
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 20%">
                            20%
                        </div>
                        <div class="progress-bar progress-bar-danger" style="width: 10%">
                            10%
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


@endsection
