@extends('layouts.master')

@section('title')
    {{ trans('header.config') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        @include('layouts.config.header')

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            {{-- 语言和地区 --}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $heading }}
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <h3>{{ $list_title }}</h3>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            @include('layouts.config.common.type-add')
                        </div>
                    </div>
                    <hr>
                    @include('layouts.config.common.type-table', ['models' => $models])

                </div>
            </div>

        </div>

    </div>


@endsection