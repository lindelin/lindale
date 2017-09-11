@extends('layouts.auth-master')

@section('panel-title')
    {{ trans('auth.login') }}
@endsection

@section('panel-body')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">{{ trans('auth.email') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">{{ trans('auth.password') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> {{ trans('auth.remember') }}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button id="login-button" type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-log-in"></span> {{ trans('auth.login') }}
                </button>　
                <a href="{{ url('/password/reset') }}">
                    {{ trans('auth.forgot') }}
                </a>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-globe"></span> {{ trans('header.'.config('app.locale')) }} <strong class="caret"></strong>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('lang', ['lang' => 'en']) }}">English</a>
                </li>
                <li>
                    <a href="{{ route('lang', ['lang' => 'ja']) }}">日本語</a>
                </li>
                <li>
                    <a href="{{ route('lang', ['lang' => 'zh']) }}">中文</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
