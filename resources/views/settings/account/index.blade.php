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
            <div class="well well-home">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4><span class="glyphicon glyphicon-lock lindale-icon-color"></span> {{ trans('user.account') }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="{{ url('settings/account') }}" method="POST" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                {{-- 框架 --}}
                                <div class="col-xs-12 col-sm-10 col-md-9 col-lg-7">
                                    {{-- 旧密码 --}}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <h3><small>{{ trans('auth.password') }}</small></h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <div>
                                                            <input type="password" class="form-control" name="password" value="">
                                                            @include('layouts.common.error-one', ['field' => 'password'])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- 新密码 --}}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <h3><small>{{ trans('validation.attributes.new-password') }}</small></h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                        <div>
                                                            <input type="password" class="form-control" name="new-password" value="">
                                                            @include('layouts.common.error-one', ['field' => 'new-password'])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- 传真 --}}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <h3><small>{{ trans('auth.confirm_password') }}</small></h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group{{ $errors->has('new-password_confirmation') ? ' has-error' : '' }}">
                                                        <div>
                                                            <input type="password" class="form-control" name="new-password_confirmation" value="">
                                                            @include('layouts.common.error-one', ['field' => 'new-password_confirmation'])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- 提交 --}}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <button type="submit" class="btn btn-success">{{ trans('config.save') }}</button>
                                        </div>
                                    </div>

                                </div>
                                {{-- 框架 --}}
                                <div class="col-xs-0 col-sm-2 col-md-3 col-lg-5">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection