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
            {{-- 语言和地区 --}}
            <div class="well well-home">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4><span class="glyphicon glyphicon-globe lindale-icon-color"></span> {{ trans('config.locale') }}</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="{{ url('/settings/locale') }}" method="post" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="row">
                                {{-- 框架 --}}
                                <div class="col-xs-12 col-sm-11 col-md-10 col-lg-8">

                                    {{-- 项目语言设置 --}}
                                    @include('layouts.settings.locale.lang')

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <button type="submit" class="btn btn-warning">
                                                {{ trans('config.save') }}
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                {{-- 框架 --}}
                                <div class="col-xs-0 col-sm-1 col-md-2 col-lg-4">

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection