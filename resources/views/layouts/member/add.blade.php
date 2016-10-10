<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
        <!-- 模态窗按钮 -->
        <button type="button" class="btn btn-link my-tooltip" title="{{ trans('member.add-member') }}" data-toggle="modal" data-target="#addMember">
            <h4 class="text-success"><span class="glyphicon glyphicon-plus"></span></h4>
        </button>

        <!-- 模态窗 -->
        <div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel" align="left">{{ trans('member.add-input') }}</h4>
                    </div>
                    <form action="{{ url("project/$project->id/member") }}" method="POST" style="display: inline;">
                        <div class="modal-body" align="left">
                            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('member.user-list') }}
                                </label>
                                <div>
                                    <select class="selectpicker form-control" data-live-search="true" name="id">
                                        <option value="">{{ trans('project.none') }}</option>
                                        @foreach( $users as $user)
                                            <option value="{{ $user->id }}" @if(old('id') == $user->id) selected @endif>{{ $user->name }}（{{ $user->email }}）</option>
                                        @endforeach
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'id'])
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> {{ trans('member.cancel') }}
                            </button>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-plus"></span> {{ trans('member.add-member') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
        <a href="{{ url("project/$project->id/member/create") }}" class="btn btn-link my-tooltip" title="{{ trans('wiki.submit') }}">
            <h4 class="text-success"><span class="glyphicon glyphicon-plus"></span></h4>
        </a>
        <a href="{{ url("project/$project->id/member/create") }}" class="btn btn-link my-tooltip" title="{{ trans('wiki.submit') }}">
            <h4 class="text-success"><span class="glyphicon glyphicon-list"></span></h4>
        </a>

    </div>
</div>--}}