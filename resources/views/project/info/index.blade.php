@extends('layouts.master')

@section('title')
    {{ trans('header.info') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">

            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h3 class="lindale-color">
                        <span class="glyphicon glyphicon-info-sign lindale-icon-color"></span>
                        {{ trans('header.info') }}
                    </h3>
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
        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

            @include('layouts.project.common.project-icon')
            @include('layouts.project.common.project-statuses')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="{{ url('project/'.$project->id.'/edit') }}" class="btn btn-success btn-block">
                        {{ trans('project.edit-project') }}
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h5 class="lindale-color"><span class="glyphicon glyphicon-king lindale-icon-color"></span> {{ $pl->name }}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($sl != null)
                        <h5 class="lindale-color"><span class="glyphicon glyphicon-queen lindale-icon-color"></span> {{ $sl->name }}</h5>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($paCount !== 0)
                        <h5 class="lindale-color"><span class="glyphicon glyphicon-bishop lindale-icon-color"></span> {{ $paCount }}</h5>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($pmCount !== 0)
                        <h5 class="lindale-color"><span class="glyphicon glyphicon-pawn lindale-icon-color"></span> {{ $pmCount }}</h5>
                    @endif
                </div>
            </div>
            @include('layouts.project.common.project-info')
            {{--@include('layouts.project.common.project-progress')--}}

        </div>
    </div>


@endsection
