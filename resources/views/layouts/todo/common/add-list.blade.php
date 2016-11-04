@if(isset($add_todo_list) == 'on')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading" style="{{ Colorable::lindale() }}">{{ trans('todo.add-todo-list') }}</div>
                <div class="panel-body">
                    <form action="{{ $add_list_store_url }}" method="POST" role="form">
                        {{ csrf_field() }}

                        {{-- 添加索引 --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('type_name') ? ' has-error' : '' }}">
                                <div>
                                    <input type="text" class="form-control" name="type_name" value="{{ old('type_name') }}">
                                    @include('layouts.common.error-one', ['field' => 'type_name'])
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span class="glyphicon glyphicon-plus"></span> {{ trans('todo.add') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="list-group">
            <a href="{{ $add_list_create_url }}" class="list-group-item">
                <span class="glyphicon glyphicon-plus"></span> {{ trans('todo.add-todo-list') }}
            </a>
        </div>
    </div>
</div>