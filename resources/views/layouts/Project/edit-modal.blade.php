<!-- 模态窗 -->
<div class="modal fade" id="projectEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title text-danger" id="myModalLabel" align="left">{{ trans('project.edit-title') }}</h4>
            </div>
            <div class="modal-body" align="left">
                {{-- 项目密码 --}}
                <div class="form-group{{ $errors->has('project-pass') ? ' has-error' : '' }}">
                    <label for="project-pass" class="control-label">
                        {{ trans('project.delete-input') }}
                    </label>
                    <div>
                        <input id="password" type="password" class="form-control" name="project-pass">
                        @include('layouts.common.error-one', ['field' => 'project-pass'])
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> {{ trans('project.cancel') }}
                </button>
                <button type="submit" class="btn btn-warning">
                    <span class="glyphicon glyphicon-edit"></span> {{ trans('project.edit-project') }}
                </button>
            </div>
        </div>
    </div>
</div>