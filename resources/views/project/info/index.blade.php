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
                    <h3><span class="glyphicon glyphicon-info-sign"></span> {{ trans('header.info') }}</h3>
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
            {{--<div class="row">
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
                                    --}}{{--@foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>@include('layouts.admin.delete')</td>
                                        </tr>
                                    @endforeach--}}{{--
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            	</div>
            </div>--}}

        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

            @include('layouts.Project.common.project-icon')
            @include('layouts.Project.common.project-statuses')
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
            @include('layouts.Project.common.project-info')
            @include('layouts.Project.common.project-progress')

        </div>
    </div>


@endsection
