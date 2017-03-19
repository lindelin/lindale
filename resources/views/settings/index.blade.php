@extends('layouts.master')

@section('title')
    {{ trans('header.settings') }} - {{ config('app.title') }}
@endsection

@section('content')
    @include('layouts.common.message')

    <div class="row">
        {{-- 框架 --}}
        @include('layouts.settings.header')
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            {{-- 基本资料 --}}
            @include('layouts.settings.profile.basic')
            {{-- 联系方式 --}}
            @include('layouts.settings.profile.contact')
        </div>
    </div>


@endsection