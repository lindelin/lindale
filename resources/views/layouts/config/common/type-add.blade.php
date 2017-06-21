<!-- 模态窗按钮 -->
<a href="#" class="btn btn-link" data-toggle="modal" data-target="#typeCommonAdd">
    <h4 class="text-success"><span class="glyphicon glyphicon-plus"></span></h4>
</a>

<!-- 模态窗 -->
<div class="modal fade" id="typeCommonAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="left">{{ $list_title }}</h4>
            </div>
            <form action="{{ $add_url }}" method="POST" style="display: inline;">
                <div class="modal-body" align="left">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="control-label">
                            {{ trans('config.type-name') }}
                        </label>
                        <div>
                            <input type="text" class="form-control" name="name" value="" required="required" />
                            @include('layouts.common.error-one', ['field' => 'name'])
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('color_id') ? ' has-error' : '' }}">
                        <label class="control-label">
                            {{ trans('todo.color') }}
                        </label>
                        <div>
                            <select class="selectpicker form-control" name="color_id" required="required">
                                @foreach( config('color.common') as $id => $color)
                                    <option value="{{ $id }}">{{ trans($color) }}</option>
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
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-pencil"></span> {{ trans('common.add') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>