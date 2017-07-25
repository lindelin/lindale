@extends('layouts.master')

@section('title')
    {{ trans('header.progress') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    @include('layouts.progress.title')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @component('components.well')
                @slot('title')
                    <i class="fa fa-tasks fa-lg lindale-icon-color" aria-hidden="true"></i> {{ trans('progress.gantt') }}
                @endslot
                {!! $gantt !!}
            @endcomponent
        </div>
    </div>

@endsection
