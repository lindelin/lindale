@extends('layouts.master')

@section('title')
    {{ trans('header.project') }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.top-panel')
    @include('layouts.common.message')
    <div class='notifications top-left'></div>

    <div class="row">
        @foreach( $projects as $project)

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                @include('layouts.project.well')
            </div>

        @endforeach
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
            {{ $projects->links() }}
        </div>
    </div>

@endsection