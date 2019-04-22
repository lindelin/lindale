@extends('layouts.auth')

@section('title', trans('auth.login'))

@section('content')
<div class="col-lg-4 mx-auto">
    <div class="auto-form-wrapper">
        <div class="row mb-4 mt-0">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="{{ url('/') }}" class="btn btn-outline-success">
                    <icon icon="long-arrow-alt-left" size="4x"></icon>
                </a>
            </div>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email" class="label">{{ trans('auth.email') }}</label>
                <div class="input-group">
                    <input id="email" type="email" name="email" class="form-control is-invalid" placeholder="{{ trans('auth.email') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control is-invalid" placeholder="*********">
                </div>
            </div>
            <div class="form-group">
                <p class="text-danger">sdfasdfadsaf</p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block">Login</button>
            </div>
            <div class="form-group d-flex justify-content-between">
                <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                </div>
                <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
            </div>
            <div class="form-group">
                <button class="btn btn-block g-login">
                    <img class="mr-3" src="../../images/file-icons/icon-google.svg" alt="">Log in with Google</button>
            </div>
            <div class="text-block text-center my-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <icon icon="coffee"></icon> Dropdown button
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <ul class="auth-footer">
        <li>
            <a href="#">Conditions</a>
        </li>
        <li>
            <a href="#">Help</a>
        </li>
        <li>
            <a href="#">Terms</a>
        </li>
    </ul>
    <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
</div>
@endsection