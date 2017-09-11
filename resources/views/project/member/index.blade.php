@extends('layouts.master')

@section('title')
    {{ trans('header.member') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">


            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h3 class="lindale-color">
                        <span class="glyphicon glyphicon-user lindale-icon-color"></span>
                        {{ trans('header.member') }}
                    </h3>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align="right">
                    @include('layouts.member.add')
                </div>
            </div>
            <hr>
            <div class="row">

                {{-- 项目总监 --}}
                @include('layouts.member.pl')

                @if($sl)
                    {{-- 项目副总监 --}}
                    @include('layouts.member.sl')
                @endif

            	@foreach($pms as $pm)
                    @include('layouts.member.pm')
                @endforeach
            </div>


        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

            @include('layouts.member.menu')

            @include('layouts.member.invite')

        </div>
    </div>


@endsection
