<!-- 模态窗按钮 -->
<a href="#member{{ $member->id }}" data-toggle="modal" data-target="#member{{ $member->id }}" class="my-tooltip" title="{{ trans('member.policy') }}">
    <span class="glyphicon glyphicon-flag lindale-color"></span>
</a>

<!-- 模态窗 -->
<div class="modal fade" id="member{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title text-danger" id="myModalLabel" align="left">{{ trans('member.policy') }}</h4>
            </div>
            <form action="{{ url("project/$project->id/member/$member->id") }}" method="POST" style="display: inline;">
                <div class="modal-body" align="left">
                    <h3 style="color: #000000">{{ $member->name }}（{{ $member->email }}）
                        <br><small>{{ trans('member.created') }}：{{ $member->pivot->created_at }}</small>
                    </h3>
                    <hr>
                    {{-- 権限 --}}
                    <div class="form-group{{ $errors->has('policy') ? ' has-error' : '' }}">
                        <div>
                            <select class="selectpicker form-control" name="policy">
                                <option value="0" @if($member->pivot->is_admin !== Definer::PROJECT_ADMIN) selected @endif>{{ trans('project.none') }}</option>
                                <option value="{{ Definer::PROJECT_ADMIN }}" @if($member->pivot->is_admin === Definer::PROJECT_ADMIN) selected @endif>{{ trans_choice('member.pa', 1) }}</option>
                            </select>
                            @include('layouts.common.error-one', ['field' => 'policy'])
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> {{ trans('member.cancel') }}
                    </button>
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning">
                        <span class="glyphicon glyphicon-edit"></span> {{ trans('member.policy') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
