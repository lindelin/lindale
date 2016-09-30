@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
    	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            @include('layouts.admin.menu')
    	</div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lindalë Information Center</h3>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>


@endsection