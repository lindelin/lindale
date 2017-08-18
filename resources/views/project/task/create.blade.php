@extends('layouts.master')

@section('title')
    {{ trans('header.tasks') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="{{ url('project/'.$project->id.'/task/task') }}" method="post" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}

                <h3><span class="glyphicon glyphicon-tasks"></span> {{ trans('task.new-task') }}</h3>
                <hr>

                <div class="row">
                    {{-- 框架 --}}
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

                        @if($groups->count() > 0)
                            {{-- 任务组 --}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
                                    <label class="control-label">{{ trans('task.group') }}</label>
                                    <div>
                                        <select class="selectpicker form-control" data-live-search="true" name="group_id">
                                            <option value="" @if(old('group_id') == '') selected @endif>{{ trans('task.none') }}</option>
                                            @foreach( $openGroups as $group)
                                                <option value="{{ $group->id }}" @if(old('group_id') == $group->id) selected @endif>{{ $group->title }}</option>
                                            @endforeach
                                        </select>
                                        @include('layouts.common.error-one', ['field' => 'group_id'])
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- 任务名 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.task-title') }}
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                    @include('layouts.common.error-one', ['field' => 'title'])
                                </div>
                            </div>
                        </div>

                        {{-- 任务描述 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.info') }}
                                </label>
                                <div>
                                    <textarea class="form-control" rows="8" name="content" data-provide="markdown" placeholder=" Markdown">{{ old('content') }}</textarea>
                                    @include('layouts.common.error-one', ['field' => 'content'])
                                </div>
                            </div>
                        </div>

                        {{-- 开始时间 --}}
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group{{ $errors->has('start_at') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.start_at') }}
                                </label>
                                <div>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="start_at" value="{{ old('start_at') }}"/>
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
                                <label class="control-label">{{ trans('task.end_at') }}</label>
                                <div>
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" name="end_at" value="{{ old('end_at') }}"/>
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

                        {{-- 耗时 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.cost') }}
                                </label>
                                <div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="cost" value="{{ old('cost') }}">
                                        <span class="input-group-addon">{{ trans('task.hour') }}</span>
                                    </div>
                                    @include('layouts.common.error-one', ['field' => 'cost'])
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- 框架 --}}
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                        {{-- 类型 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('task.type') }}</label>
                                <div>
                                    <select class="selectpicker form-control" data-live-search="true" name="type_id">
                                        @foreach( $types as $type)
                                            <option value="{{ $type->id }}" @if(old('type_id') == $type->id) selected @endif>{{ trans($type->name) }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'type_id'])
                                </div>
                            </div>
                        </div>

                        {{-- 负责人 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('task.user') }}</label>
                                <div>
                                    <select class="selectpicker form-control" data-live-search="true" name="user_id">
                                        <option value="" @if(old('user_id') == '') selected @endif>{{ trans('task.none') }}</option>
                                        <option value="{{ $project->ProjectLeader->id }}" @if(old('user_id') == $project->ProjectLeader->id) selected @endif>
                                            {{ $project->ProjectLeader->name }}（{{ $project->ProjectLeader->email }}）
                                        </option>
                                        @if($project->SubLeader != null)
                                            <option value="{{ $project->SubLeader->id }}" @if(old('user_id') == $project->SubLeader->id) selected @endif>
                                                {{ $project->SubLeader->name }}（{{ $project->SubLeader->email }}）
                                            </option>
                                        @endif
                                        @foreach( $users as $user)
                                            <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>{{ $user->name }}（{{ $user->email }}）</option>
                                        @endforeach
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'user_id'])
                                </div>
                            </div>
                        </div>

                        {{-- 状态 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('task.status') }}</label>
                                <div>
                                    <select class="selectpicker form-control" data-live-search="true" name="status_id">
                                        @foreach( $statuses as $status)
                                            <option value="{{ $status->id }}" @if(old('status_id') == $status->id) selected @endif>{{ trans($status->name) }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'status_id'])
                                </div>
                            </div>
                        </div>

                        {{-- 优先度 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('priority_id') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('task.priority') }}</label>
                                <div>
                                    <select class="selectpicker form-control" name="priority_id">
                                        @foreach( $priorities as $priority)
                                            <option value="{{ $priority->id }}" @if(old('priority_id') ? old('priority_id') : 2 == $priority->id) selected @endif>{{ trans($priority->name) }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'priority_id'])
                                </div>
                            </div>
                        </div>

                        {{-- 颜色 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('color_id') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('todo.color') }}
                                </label>
                                <div>
                                    <select class="selectpicker form-control" name="color_id">
                                        @foreach( config('color.common') as $id => $color)
                                            <option value="{{ $id }}" @if(old('color_id') === $id) selected @endif>{{ trans($color) }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'color_id'])
                                </div>
                            </div>
                        </div>

                        {{-- 附属任务 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('contents') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.sub-task') }} 1
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="contents[]" value="{{ old('contents')[0] }}">
                                    @include('layouts.common.error-one', ['field' => 'contents'])
                                </div>
                            </div>
                        </div>

                        {{-- 附属任务 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('contents') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.sub-task') }} 2
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="contents[]" value="{{ old('contents')[1] }}">
                                    @include('layouts.common.error-one', ['field' => 'contents'])
                                </div>
                            </div>
                        </div>

                        {{-- 附属任务 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('contents') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('task.sub-task') }} 3
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="contents[]" value="{{ old('contents')[2] }}">
                                    @include('layouts.common.error-one', ['field' => 'contents'])
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                        <a href="{{ url('project/'.$project->id.'/task') }}" class="btn btn-success">{{ trans('task.cancel') }}</a>
                        <button type="submit" class="btn btn-primary">{{ trans('task.submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection