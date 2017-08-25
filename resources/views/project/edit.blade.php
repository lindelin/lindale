@extends('layouts.master')

@section('title')
    {{ trans('project.edit-project') }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.common.message')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="{{ url('project/'.$project->id) }}" method="post" role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}


                <legend>{{ trans('project.edit-project') }}</legend>

                <div class="row">
                    {{-- 框架 --}}
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

                        {{-- 项目名 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('project.title') }}
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="title" value="{{ $project->title }}">
                                    @include('layouts.common.error-one', ['field' => 'title'])
                                </div>
                            </div>
                        </div>

                        {{-- 项目描述 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('project.content') }}
                                </label>
                                <div>
                                    <textarea class="form-control" rows="8" name="content" value="" data-provide="markdown" placeholder=" Markdown">{{ $project->content }}</textarea>
                                    @include('layouts.common.error-one', ['field' => 'content'])
                                </div>
                            </div>
                        </div>

                        {{-- 开始时间 --}}
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group{{ $errors->has('start_at') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('project.start_at') }}
                                </label>
                                <div>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="start_at" value="{{ $project->start_at }}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    @include('layouts.common.error-one', ['field' => 'start_at'])
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker1').datetimepicker({
                                            format: 'YYYY-MM-DD'
                                        });
                                    });
                                </script>
                            </div>
                        </div>

                        {{-- 结束时间 --}}
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group{{ $errors->has('end_at') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('project.end_at') }}</label>
                                <div>
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" name="end_at" value="{{ $project->end_at }}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    @include('layouts.common.error-one', ['field' => 'end_at'])
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker2').datetimepicker({
                                            format: 'YYYY-MM-DD'
                                        });
                                    });
                                </script>
                            </div>
                        </div>


                    </div>
                    {{-- 框架 --}}
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                        {{-- 类型 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('project.type') }}</label>
                                <div>
                                    <input type="text" class="form-control" name="type_id" value="{{ old('type_id') ?? $project->type_id }}">
                                    @include('layouts.common.error-one', ['field' => 'type_id'])
                                </div>
                            </div>
                        </div>

                        {{-- 项目副总监 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('sl_id') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('project.sl') }}</label>
                                <div>
                                    <select class="selectpicker form-control" data-live-search="true" name="sl_id">
                                        <option value="">{{ trans('project.none') }}</option>
                                        @foreach( $users as $user)
                                            <option value="{{ $user->id }}" @if($project->sl_id == $user->id) selected @endif>{{ $user->name }}（{{ $user->email }}）</option>
                                        @endforeach
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'sl_id'])
                                </div>
                            </div>
                        </div>

                        {{-- 项目状态 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('project.status') }}</label>
                                <div>
                                    <input type="text" class="form-control" name="status_id" value="{{ old('status_id') ?? $project->status_id }}">
                                    @include('layouts.common.error-one', ['field' => 'status_id'])
                                </div>
                            </div>
                        </div>

                        {{-- 项目密码 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">
                                    {{ trans('project.password') }}
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

                        {{-- 图片 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('project.add-image') }}</label>
                                @component('components.elements.form.file')
                                    image
                                @endcomponent
                                @include('layouts.common.error-one', ['field' => 'image'])
                            </div>
                        </div>

                        @include('layouts.project.edit-modal')

                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                        <a href="{{ url('project/'.$project->id.'/info') }}" class="btn btn-success">{{ trans('project.cancel') }}</a>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#projectEdit">
                            {{ trans('project.edit-project') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection