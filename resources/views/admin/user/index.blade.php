@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">

        用户管理

    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                @endif
                {{-- 动态窗 START --}}
                    <div align="right">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                             添加新用户
                        </button>
                    </div>
                    <hr>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-circle"></span></button>
                                    <h4 class="modal-title" id="myModalLabel">添加新用户</h4>
                                </div>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/adduser') }}">
                                {!! csrf_field() !!}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">Name</label>

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
                                                <label class="col-md-4 control-label">E-Mail Address</label>

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
                                                <label class="col-md-4 control-label">Password</label>

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
                                                <label class="col-md-4 control-label">Confirm Password</label>

                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" name="password_confirmation">

                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remove"></span>
                                         关闭
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>
                                        <span class="glyphicon glyphicon-ok"></span>
                                         添加
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
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            E-Mail
                        </th>
                        <th>
                            最后登陆时间
                        </th>
                        <th>
                            创建时间
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        @if($key%2 == 0)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->updated_at }}
                        </td>
                        <td>
                            {{ $user->created_at }}
                        </td>
                    </tr>
                    @else
                    <tr class="active">
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->updated_at }}
                        </td>
                        <td>
                            {{ $user->created_at }}
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
