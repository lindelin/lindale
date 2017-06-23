<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-home">
            <div class="row">
                <div class="col-xs-9 col-sm-6 col-md-6 col-lg-6">

                    <a href="{{ url('todo') }}" class="btn  btn-xs btn-primary">{{ trans('todo.all-todos') }}</a>
                    <a href="{{ url('todo/type/'.config('todo.public')) }}" class="btn  btn-xs btn-success">{{ trans('type.public') }}</a>
                    <a href="{{ url('todo/type/'.config('todo.private')) }}" class="btn  btn-xs btn-warning">{{ trans('type.private') }}</a>

                </div>
                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6" align="right">
                    @include('layouts.todo.todo-add')
                </div>
            </div>
        </div>
    </div>
</div>