@extends('layouts.master')

@section('title')
    SHOW
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">


            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h2>To-dos</h2>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align="right">
                    @include('layouts.todo.add')
                </div>
            </div>
            <hr>
            @foreach( $todos as $todo)
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    
                    <div class="panel {{ Colorable::panelColorClass($todo->color_id) }}">
                        <div class="panel-heading" role="tab" id="heading{{ $todo->id }}">
                            <div class="row">
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    <h4 class="panel-title">
                                        <a href="#">
                                            <i class="fa fa-circle-o-notch fa-spin fa-lg fa-fw"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $todo->id }}" aria-expanded="false" aria-controls="collapse{{ $todo->id }}">
                                        <div style="width:100%;height:17px;overflow: hidden">
                                            {{ $todo->content }}
                                        </div>
                                    </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div id="collapse{{ $todo->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $todo->id }}">
                            <div class="panel-body">
                                {{ $todo->content }}
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
            {{ $todos->links() }}

        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading" style="{{ Colorable::lindale() }}">{{ trans('todo.todo-list') }}</div>

                <!-- List group -->
                <ul class="list-group">
                    <a href="{{ url("/project/$project->id/todo") }}" class="list-group-item"><span class="badge">{{ $allTodos }}</span> {{ trans('todo.all-todos') }}</a>
                    @if($lists->count() > 0)
                        @foreach($lists as $list)
                            <a href="{{ url("/project/$project->id/todo/list/show/$list->id") }}" class="list-group-item"><span class="badge">{{ $list->Todos()->count() }}</span> {{ $list->title }}</a>
                        @endforeach
                    @endif
                </ul>
            </div>

            @include('layouts.todo.add-list')

        </div>
    </div>




@endsection