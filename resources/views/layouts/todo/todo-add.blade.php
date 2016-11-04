<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
        <!-- 模态窗按钮 -->
        <a class="my-tooltip" title="{{ trans('todo.new-todo') }}" data-toggle="modal" data-target="#addTodo">
            <span class="glyphicon glyphicon-plus"></span>
        </a>

        <!-- 模态窗 -->
        <div class="modal fade" id="addTodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel" align="left">{{ trans('todo.add-title') }}</h4>
                    </div>
                    <form action="{{ url("/todo") }}" method="POST" style="display: inline;">
                        {{ csrf_field() }}
                        <div class="modal-body" align="left">

                            {{-- To-do内容 --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                        <label class="control-label">
                                            {{ trans('todo.content') }}
                                        </label>
                                        <div>
                                            <input type="text" class="form-control" name="content" value="{{ old('content') }}">
                                            @include('layouts.common.error-one', ['field' => 'content'])
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
                                                @foreach( Definer::todoColor() as $id => $color)
                                                    <option value="{{ $id }}" @if(old('color_id') === $id) selected @endif>{{ $color }}</option>
                                                @endforeach
                                            </select>
                                            @include('layouts.common.error-one', ['field' => 'color_id'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--@if($lists->count() > 0)
                                --}}{{-- List --}}{{--
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('list_id') ? ' has-error' : '' }}">
                                            <label class="control-label">
                                                {{ trans('List') }}
                                            </label>
                                            <div>
                                                <select class="selectpicker form-control" data-live-search="true" name="list_id">
                                                    <option value="">{{ trans('project.none') }}</option>
                                                    @foreach($lists as $list)
                                                        <option value="{{ $list->id }}">{{ $list->title }}</option>
                                                    @endforeach
                                                </select>
                                                @include('layouts.common.error-one', ['field' => 'list_id'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif--}}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> {{ trans('todo.cancel') }}
                            </button>
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-plus"></span> {{ trans('todo.add') }}
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