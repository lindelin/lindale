@extends('layouts.master')

@section('title')
    {{ trans('header.progress') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    @component('components.grids.12-12-7-7')

        @include('layouts.progress.title')

        <br>

        @include('layouts.progress.basic')

        @slot('side')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {!! $schemaDonut->render() !!}
                </div>
            </div>
        @endslot

    @endcomponent

    @component('components.panels.default')
        {!! $projectProgressAreaspline->render() !!}
    @endcomponent

@endsection
