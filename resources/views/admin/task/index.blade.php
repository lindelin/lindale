@extends('layouts.admin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ trans('task.task') }}
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif
                        <br>
                        {{-- 动态窗 START --}}
                        <div align="right">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                {{ trans('task.new-task') }}
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-circle"></span></button>
                                        <h4 class="modal-title" id="myModalLabel">{{ trans('task.new-task') }}</h4>
                                    </div>
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/adduser') }}">
                                        {!! csrf_field() !!}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label class="col-md-4 control-label">{{ trans('admin.name') }}</label>

                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label class="col-md-4 control-label">{{ trans('admin.email') }}</label>

                                                        <div class="col-md-6">
                                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label class="col-md-4 control-label">{{ trans('admin.password') }}</label>

                                                        <div class="col-md-6">
                                                            <input type="password" class="form-control" name="password">

                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                        <label class="col-md-4 control-label">{{ trans('admin.confirm_password') }}</label>

                                                        <div class="col-md-6">
                                                            <input type="password" class="form-control" name="password_confirmation">

                                                            @if ($errors->has('password_confirmation'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                            @endif
                                                            <select class="selectpicker">
                                                                <option>Mustard</option>
                                                                <option>Ketchup</option>
                                                                <option>Relish</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                <span class="glyphicon glyphicon-remove"></span>
                                                {{ trans('admin.close') }}
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-btn fa-user"></i>
                                                <span class="glyphicon glyphicon-ok"></span>
                                                {{ trans('admin.add') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- 动态窗 END ----}}
                    </div>
                </div>
                <div class="row">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="tabbable" id="tabs-600587">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#panel-522154" data-toggle="tab">Section 1</a>
                                </li>
                                <li>
                                    <a href="#panel-173009" data-toggle="tab">Section 2</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="panel-522154">
                                    <div class="row">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        {{ trans('task.name') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('task.type') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('task.user') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('task.status') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('task.progress') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('task.deadline') }}
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach ($tasks as $task )
                                                <tr>
                                                    <td>
                                                        {{ $task->id }}
                                                    </td>
                                                    <td>
                                                        {{ $task->name }}
                                                    </td>
                                                    <td>
                                                        {{ $task->Type->name }}
                                                    </td>
                                                    <td>
                                                        {{ $task->User->name }}
                                                    </td>
                                                    <td>
                                                        {{ $task->Status->name }}
                                                    </td>
                                                    <td style="width: 200px;">
                                                        <div class="progress" style="margin-bottom: 0px;">
                                                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 5{{ $task->progress }}%">5{{ $task->progress }}%</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $task->deadline }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="panel-173009">
                                    <p>
                                        Howdy, I'm in Section 2.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection