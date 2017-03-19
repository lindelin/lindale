<div class="well well-home">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h4><span class="glyphicon glyphicon-envelope lindale-icon-color"></span> {{ trans('user.contact') }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="{{ url('settings/profile/'.$user->id) }}" method="post" role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="row">
                    {{-- 框架 --}}
                    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-7">
                        {{-- 电子邮件 --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><span class="glyphicon glyphicon-envelope"></span> {{ trans('user.email') }}</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="email" value="{{ $user->email }}" disabled>
                                                @include('layouts.common.error-one', ['field' => 'email'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 电话 --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><span class="glyphicon glyphicon-phone-alt"></span> {{ trans('user.phone') }}</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                                @include('layouts.common.error-one', ['field' => 'phone'])
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
                                        <h3><small><i class="fa fa-fax" aria-hidden="true"></i> {{ trans('user.fax') }}</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="fax" value="{{ $user->fax }}">
                                                @include('layouts.common.error-one', ['field' => 'fax'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 手机 --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><span class="glyphicon glyphicon-phone"></span> {{ trans('user.mobile') }}</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="mobile" value="{{ $user->mobile }}">
                                                @include('layouts.common.error-one', ['field' => 'mobile'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- GitHub --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><i class="fa fa-github-alt" aria-hidden="true"></i> GitHub</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('github') ? ' has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="github" value="{{ $user->github }}">
                                                @include('layouts.common.error-one', ['field' => 'github'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Slack --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><i class="fa fa-slack" aria-hidden="true"></i> Slack</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('slack') ? ' has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="slack" value="{{ $user->slack }}">
                                                @include('layouts.common.error-one', ['field' => 'slack'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Facebook --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="facebook" value="{{ $user->facebook }}">
                                                @include('layouts.common.error-one', ['field' => 'facebook'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- QQ --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><i class="fa fa-qq" aria-hidden="true"></i> QQ</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('qq') ? ' has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="qq" value="{{ $user->qq }}">
                                                @include('layouts.common.error-one', ['field' => 'qq'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 提交 --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn btn-success">{{ trans('user.update-contact') }}</button>
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