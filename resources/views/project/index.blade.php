@extends('layouts.master')

@section('title')
    {{ trans('header.project') }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.top-panel')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
        @foreach( $projects as $project)

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                @include('layouts.Project.well')
            </div>

        @endforeach
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
            {{ $projects->links() }}
        </div>
    </div>

@endsection