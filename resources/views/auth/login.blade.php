@extends('layouts.auth')

@section('title')
    {{ trans('auth.login') }} | {{ config('app.name') }}
@endsection

@section('content')
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
            <div class="col-6 col-md-4 col-lg-4">
                <img src="{{ asset('img/logo.png') }}"  class="img-thumbnail" style="border: none">
            </div>
            <div class="col"></div>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
            {{ csrf_field() }}
            <auth-form-input name="email"
                             type="email"
                             display-name="{{ trans('auth.email') }}"
                             :is-invalid="@json($errors->has('email'))"
                             value="{{ old('email') }}"></auth-form-input>
            <auth-form-input name="password"
                             type="password"
                             display-name="{{ trans('auth.password') }}"
                             :is-invalid="@json($errors->has('password'))"
                             value=""></auth-form-input>
            <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block">
                    <icon icon="sign-in-alt" size="1x"></icon> {{ trans('auth.login') }}
                </button>
            </div>
            <div class="form-group d-flex justify-content-between">
                <auth-checkout-box name="remember" display-name="{{ trans('auth.remember') }}"></auth-checkout-box>
                <a href="{{ url('/password/reset') }}" class="text-small forgot-password text-black">{{ trans('auth.forgot') }}</a>
            </div>
            <div class="text-block text-right my-3">
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <icon icon="globe-americas"></icon> {{ trans('header.'.config('app.locale')) }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('lang', ['lang' => 'en']) }}">English</a>
                        <a class="dropdown-item" href="{{ route('lang', ['lang' => 'ja']) }}">日本語</a>
                        <a class="dropdown-item" href="{{ route('lang', ['lang' => 'zh']) }}">中文</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <ul class="auth-footer">
        <li><a href="https://www.lindelin.org">About</a></li>
        <li><a href="https://github.com/lindelin/lindale/issues">Help</a></li>
        <li><a href="https://jp.lindelin.org/privacy/">Privacy Policy</a></li>
    </ul>
    <p class="footer-text text-center">Powered by Lindelin © 2019 Lindalë. All rights reserved.</p>
</div>
@endsection