@extends('layouts.master')

@section('title')
    Settings
@endsection

@section('content')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
        {{-- 框架 --}}
    	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            @include('layouts.settings.menu')
    	</div>
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Public profile
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">

                    	</div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection