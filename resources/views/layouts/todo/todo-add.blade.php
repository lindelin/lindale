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
                    <div class="modal-body" align="left">

                    <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#public-todo" role="tab" data-toggle="tab">{{ trans('type.public') }}</a></li>
                            <li role="presentation"><a href="#private-todo" role="tab" data-toggle="tab">{{ trans('type.private') }}</a></li>
                        </ul>
                        <br>
                        <!-- Tab panes -->
                        {{-- 公开To-do FORM --}}
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="public-todo">
                                @if($MProjects->count() > 0 or $JProjects->count() > 0)
                                    <form action="{{ url("/todo") }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="type_id" value="{{ Definer::PUBLIC_TODO }}" />
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
                                        {{-- 所属项目 --}}
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                                                    <label class="control-label">
                                                        {{ trans('header.project') }}
                                                    </label>
                                                    <div>
                                                        <select class="selectpicker form-control" data-live-search="true" name="project_id">
                                                            @if($MProjects->count() > 0)
                                                                @foreach($MProjects as $project)
                                                                    <option value="{{ $project->id }}" @if(old('project_id') === $project->id) selected @endif>
                                                                        {{ $project->title }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                            @if($JProjects->count() > 0)
                                                                @foreach($JProjects as $project)
                                                                    <option value="{{ $project->id }}" @if(old('project_id') === $project->id) selected @endif>
                                                                        {{ $project->title }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @include('layouts.common.error-one', ['field' => 'project_id'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- TODO描述 --}}
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                                    <label class="control-label">
                                                        {{ trans('todo.details') }}
                                                    </label>
                                                    <div>
                                                        <textarea class="form-control" rows="8" name="details" value="" data-provide="markdown" placeholder=" Markdown">{{ old('details') }}</textarea>
                                                        @include('layouts.common.error-one', ['field' => 'details'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div align="center">
                                            <button type="submit" class="btn btn-success">
                                                <span class="glyphicon glyphicon-plus"></span> {{ trans('todo.add') }}
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <div class="row">
                                    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                                    		<h2>{{ trans('todo.can-not-add') }}</h2>
                                            <h2><small>{{ trans('project.none-project') }}</small></h2>
                                    	</div>
                                    </div>
                                @endif
                            </div>
                            {{-- 私密To-do FORM --}}
                            <div role="tabpanel" class="tab-pane" id="private-todo">
                                <form action="{{ url("/todo") }}" method="POST" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="type_id" value="{{ Definer::PRIVATE_TODO }}" />
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
                                    @if($lists->count() > 0)
                                        {{-- List --}}
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
                                    @endif
                                    {{-- TODO描述 --}}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                                <label class="control-label">
                                                    {{ trans('todo.details') }}
                                                </label>
                                                <div>
                                                    <textarea class="form-control" rows="8" name="details" value="" data-provide="markdown" placeholder=" Markdown">{{ old('details') }}</textarea>
                                                    @include('layouts.common.error-one', ['field' => 'details'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div align="center">
                                        <button type="submit" class="btn btn-success">
                                            <span class="glyphicon glyphicon-plus"></span> {{ trans('todo.add') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> {{ trans('todo.cancel') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>