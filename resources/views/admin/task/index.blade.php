@extends('layouts.admin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ trans('task.task') }}
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                @endif
                @include('layouts.admin.task.form')
                @include('layouts.admin.task.table')
            </div>
        </div>
    </div>
@endsection