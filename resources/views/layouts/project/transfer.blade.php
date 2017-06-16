<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- 模态窗按钮 -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#projectTransfer">
            {{ trans('project.transfer') }}
        </button>

        <!-- 模态窗 -->
        <div class="modal fade" id="projectTransfer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                        </button>
                        <h4 class="modal-title text-danger" id="myModalLabel" align="left">{{ trans('project.transfer-info') }}</h4>
                    </div>
                    <form action="{{ url('project/transfer/'.$project->id) }}" method="POST" style="display: inline;">
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
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-transfer"></span> {{ trans('project.transfer') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>