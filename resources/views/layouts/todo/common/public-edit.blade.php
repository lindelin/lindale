<!-- 模态窗按钮 -->
<script>
    $(document).ready(function(){
        $('#checkbox-delete{{ $todo->id }}').change(function () {
            $('#delete{{ $todo->id }}').prop("disabled", $(this).is(':checked') == false);
        }).change();
    });
</script>
<h4 class="panel-title">
    <a class="my-tooltip" title="{{ trans('todo.edit-title') }}" data-toggle="modal" data-target="#editTodo{{ $todo->id }}">
        <span class="glyphicon glyphicon-cog"></span>
    </a>
</h4>

<!-- 模态窗 -->
<div class="modal fade" id="editTodo{{ $todo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="color: #000000">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="left">
                    {{ trans('todo.edit-title') }}
                    <small class="text-danger">
                    <span class="glyphicon glyphicon-trash"></span>
                        <label for="checkbox-delete{{ $todo->id }}">{{ trans('todo.delete') }}</label>
                        <input type="checkbox" id="checkbox-delete{{ $todo->id }}">
                    </small>
                </h4>

            </div>
            <form action="{{ $public_todo_edit_url }}" method="POST" style="display: inline;">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="modal-body" align="left" style="color: #000000">

                    {{-- To-do内容 --}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('todo.content') }}
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="content" value="{{ $todo->content }}">
                                    @include('layouts.common.error-one', ['field' => 'content'])
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- 负责人 --}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('todo.user') }}
                                </label>
                                <div>
                                    <select class="selectpicker form-control" data-live-search="true" name="user_id">
                                        <option value="">{{ trans('project.none') }}</option>
                                        <option value="{{ $pl->id }}" @if($todo->user_id === $pl->id) selected @endif>PL: {{ $pl->name }}({{ $pl->email }})</option>
                                        @if($sl != null)
                                            <option value="{{ $sl->id }}" @if($todo->user_id === $sl->id) selected @endif>SL: {{ $sl->name }}({{ $sl->email }})</option>
                                        @endif
                                        @foreach($pms as $pm)
                                            <option value="{{ $pm->id }}" @if($todo->user_id === $pm->id) selected @endif>PM: {{ $pm->name }}({{ $pm->email }})</option>
                                        @endforeach
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'user_id'])
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- 颜色 --}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('color_id') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('todo.color') }}
                                </label>
                                <div>
                                    <select class="selectpicker form-control" name="color_id">
                                        @foreach( config('color.common') as $id => $color)
                                            <option data-content="{{ Colorable::label($id, trans($color)) }}" value="{{ $id }}" @if($todo->color_id === $id) selected @endif>{{ trans($color) }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts.common.error-one', ['field' => 'color_id'])
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($lists->count() > 0)
                        {{-- List --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group{{ $errors->has('list_id') ? ' has-error' : '' }}">
                                    <label class="control-label">
                                        {{ trans('todo.todo-list') }}
                                    </label>
                                    <div>
                                        <select class="selectpicker form-control" data-live-search="true" name="list_id">
                                            <option value="">{{ trans('project.none') }}</option>
                                            @foreach($lists as $list)
                                                <option value="{{ $list->id }}" @if($todo->list_id === $list->id) selected @endif>{{ $list->title }}</option>
                                            @endforeach
                                        </select>
                                        @include('layouts.common.error-one', ['field' => 'list_id'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- TODO描述 --}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                <label class="control-label">
                                    {{ trans('todo.details') }}
                                </label>
                                <div>
                                    <textarea class="form-control" rows="8" name="details" value="" data-provide="markdown" placeholder=" Markdown">{{ old('details') ?? $todo->details }}</textarea>
                                    @include('layouts.common.error-one', ['field' => 'details'])
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                            @if($todo->status_id === config('todo.status.finished'))
                            @else
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span> {{ trans('todo.cancel') }}
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit"></span> {{ trans('todo.edit') }}
                                </button>
                            @endif
                    	</div>
                    </div>

                </div>
            </form>
            <div class="modal-footer" style="color: #000000">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="{{ $todo_delete_url }}" method="post" role="form">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-block" id="delete{{ $todo->id }}">
                                <span class="glyphicon glyphicon-trash"></span> {{ trans('todo.delete-title') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>