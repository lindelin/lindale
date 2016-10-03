@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
        @include('layouts.admin.header')
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Users Information Center</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <h3>{{ trans('user.add-user') }}</h3>
                    	</div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            @include('layouts.admin.add')
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <form action="{{ url('admin/user') }}" method="post" role="form" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    {{-- 框架 --}}
                                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

                                        {{-- 电子邮件 --}}
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="control-label">
                                                    {{ trans('user.email') }}
                                                </label>
                                                <div>
                                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                                    @include('layouts.common.error-one', ['field' => 'email'])
                                                </div>
                                            </div>
                                        </div>

                                        {{-- 自我介绍 --}}
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                                <label class="control-label">
                                                    {{ trans('user.content') }}
                                                </label>
                                                <div>
                                                    <textarea class="form-control" rows="8" name="content" value="">{{ old('content') }}</textarea>
                                                    @include('layouts.common.error-one', ['field' => 'content'])
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    {{-- 框架 --}}
                                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                                        {{-- 名字 --}}
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="control-label">
                                                    {{ trans('user.name') }}
                                                </label>
                                                <div>
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                                    @include('layouts.common.error-one', ['field' => 'name'])
                                                </div>
                                            </div>
                                        </div>

                                        {{-- 密码 --}}
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="control-label">
                                                    {{ trans('auth.password') }}
                                                </label>
                                                <div>
                                                    <input id="password" type="password" class="form-control" name="password">
                                                    @include('layouts.common.error-one', ['field' => 'password'])
                                                </div>
                                            </div>
                                        </div>

                                        {{-- 确认密码 --}}
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label for="password-confirm" class="control-label">
                                                    {{ trans('project.password_confirmation') }}
                                                </label>
                                                <div>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                                    @include('layouts.common.error-one', ['field' => 'password_confirmation'])
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                                        <a href="{{ url('admin/user') }}" class="btn btn-success">{{ trans('user.cancel') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ trans('user.submit') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection