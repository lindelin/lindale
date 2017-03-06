@extends('layouts.master')

@section('title')
    {{ trans('header.admin') }} - {{ config('app.title') }}
@endsection

@section('content')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
        {{-- 框架 --}}
        @include('layouts.admin.header')
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lindalë Information Center</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            {!! $UserChart->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection