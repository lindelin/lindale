@extends('layouts.master')

@section('title')
    {{ trans('header.config') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        @include('layouts.config.header')

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">

            {{ $slot }}

        </div>

    </div>


@endsection