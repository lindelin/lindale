@extends('layouts.master')

@section('title')
    {{ trans('header.admin') }} - {{ config('app.title') }}
@endsection

@section('content')
    @include('layouts.common.message')

    <div class="row">
        {{-- 框架 --}}
        @include('layouts.admin.header')
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            @include('layouts.admin.route-manager')
        </div>
    </div>


@endsection