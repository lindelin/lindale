<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
        <!-- 模态窗按钮 -->
        <button type="button" class="btn btn-link my-tooltip" title="{{ trans('project.delete') }}" data-toggle="modal" data-target="#projectDelete">
            <h4 class="text-danger"><span class="glyphicon glyphicon-trash"></span></h4>
        </button>

        <!-- 模态窗 -->
        <div class="modal fade" id="projectDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                        </button>
                        <h4 class="modal-title text-danger" id="myModalLabel" align="left">{{ trans('project.delete-title') }}</h4>
                    </div>
                    <form action="{{ url('project/'.$project->id) }}" method="POST" style="display: inline;">
                        <div class="modal-body" align="left">
                            {{-- 项目密码 --}}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">
                                    {{ trans('project.delete-input') }}
                                </label>
                                <div>
                                    <input id="password" type="password" class="form-control" name="password">
                                    @include('layouts.common.error-one', ['field' => 'password'])
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> {{ trans('project.cancel') }}
                            </button>
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span> {{ trans('project.delete') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>