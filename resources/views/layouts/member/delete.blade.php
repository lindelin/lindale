<!-- 模态窗按钮 -->
<a href="#removeMember{{ $remove_member->id }}" data-toggle="modal" data-target="#removeMember{{ $remove_member->id }}" class="my-tooltip" title="{{ trans('member.delete-title') }}">
    <span class="glyphicon glyphicon-log-out lindale-color"></span>
</a>

<!-- 模态窗 -->
<div class="modal fade" id="removeMember{{ $remove_member->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title text-danger" id="myModalLabel" align="left">{{ trans('member.delete-input') }}</h4>
            </div>
            <form action="{{ url("project/$project->id/member/$remove_member->id") }}" method="POST" style="display: inline;">
                <div class="modal-body" align="left">
                    <h3 style="color: #000000">{{ $remove_member->name }}（{{ $remove_member->email }}）
                        <br><small>{{ trans('member.created') }}：{{ $remove_member->pivot->created_at }}</small>
                    </h3>
                    <hr>
                    {{-- 项目密码 --}}
                    <div class="form-group{{ $errors->has('project-pass') ? ' has-error' : '' }}">
                        <label for="project-pass" class="control-label" style="color: #000000">
                            {{ trans('project.delete-input') }}
                        </label>
                        <div>
                            <input id="project-pass" type="password" class="form-control" name="project-pass">
                            @include('layouts.common.error-one', ['field' => 'project-pass'])
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> {{ trans('member.cancel') }}
                    </button>
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> {{ trans('member.delete') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
