<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
        <!-- 模态窗按钮 -->
        <button type="button" class="btn btn-success btn-block my-tooltip" title="{{ trans('member.invite-member') }}" data-toggle="modal" data-target="#inviteMember">
            <span class="glyphicon glyphicon-send"></span> {{ trans('member.invite-member') }}
        </button>

        <!-- 模态窗 -->
        <div class="modal fade" id="inviteMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel" align="left">{{ trans('member.invite-member') }}</h4>
                    </div>
                    <form action="{{ route('member.invite', compact('project')) }}" method="POST" style="display: inline;">
                        <div class="modal-body" align="left">
                            <div class="row">
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
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> {{ trans('member.cancel') }}
                            </button>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-send"></span> {{ trans('member.invite-member') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>