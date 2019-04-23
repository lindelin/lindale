@extends('layouts.auth')

@section('title')
    {{ trans('auth.login') }} | {{ config('app.name') }}
@endsection

@section('content')
    <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <div class="auto-form-wrapper">
                    <div class="row ">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="{{ url('/') }}" class="">
                                <icon icon="arrow-alt-circle-left" size="2x"></icon>
                            </a>
                        </div>
                    </div>
                    <div class="row mb-4 mt-4">
                        <div class="col"></div>
                        <div class="col-5 col-sm-3 col-md-3 col-lg-3">
                            <img src="{{ asset('img/logo.png') }}"  class="img-thumbnail" style="border: none">
                        </div>
                        <div class="col"></div>
                    </div>
                    @include('auth._login_form')
                </div>
                @include('auth._footer')
            </div>
        </div>
    </div>
@endsection