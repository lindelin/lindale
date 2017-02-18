<!-- 模态窗按钮 -->
<button type="button" class="btn btn-warning btn-xs my-tooltip" title="{{ trans('common.edit').':'.trans($model->name) }}" data-toggle="modal" data-target="#typeCommonEdit{{ $model->id }}">
    <span class="glyphicon glyphicon-edit"></span>
</button>

<!-- 模态窗 -->
<div class="modal fade" id="typeCommonEdit{{ $model->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title text-warning" id="myModalLabel" align="left">{{ trans('common.edit') }}</h4>
            </div>
            <form action="{{ $edit_url }}" method="POST" style="display: inline;">
                <div class="modal-body" align="left">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="control-label">
                            {{ trans('config.type-name') }}
                        </label>
                        <div>
                            <input type="text" class="form-control" name="name" value="{{ trans($model->name) }}" required="required" />
                            @include('layouts.common.error-one', ['field' => 'name'])
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('color_id') ? ' has-error' : '' }}">
                        <label class="control-label">
                            {{ trans('todo.color') }}
                        </label>
                        <div>
                            <select class="selectpicker form-control" name="color_id" required="required">
                                @foreach( Definer::todoColor() as $id => $color)
                                    <option value="{{ $id }}" @if($model->color_id === $id) selected @endif>{{ $color }}</option>
                                @endforeach
                            </select>
                            @include('layouts.common.error-one', ['field' => 'color_id'])
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> {{ trans('common.cancel') }}
                    </button>
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning">
                        <span class="glyphicon glyphicon-trash"></span> {{ trans('common.edit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>