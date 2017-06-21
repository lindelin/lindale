<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel {{ Colorable::panelColorClass($todo->color_id) }}">
        <div class="panel-heading" role="tab" id="heading{{ $todo->id }}">
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    @include('layouts.todo.common.status-edit', ['status_edit_url' => url("/todo/todo/$todo->id")])
                </div>
                <div class="col-xs-8 col-sm-9 col-md-9 col-lg-10">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $todo->id }}" aria-expanded="false" aria-controls="collapse{{ $todo->id }}">
                            <div style="width:100%;height:17px;overflow: hidden">
                                {{ $todo->content }}
                            </div>
                        </a>
                    </h4>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    @include('layouts.todo.common.private-edit', [
                    'public_todo_edit_url' => url("/todo/todo/$todo->id"),
                    'todo_delete_url' => url("/todo/todo/$todo->id"),
                    ])
                </div>
            </div>
        </div>
        <div id="collapse{{ $todo->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $todo->id }}">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered lindale-table">
                        <tbody>

                        <tr>
                            <th><span class="glyphicon glyphicon-pencil lindale-icon-color"></span> {{ trans('todo.initiator') }}</th>
                            <th><span class="glyphicon glyphicon-user lindale-icon-color"></span> {{ trans('todo.user') }}</th>
                            <th><span class="glyphicon glyphicon-tag lindale-icon-color"></span> {{ trans('todo.type') }}</th>
                            <th><span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ trans('todo.status') }}</th>
                            <th><span class="glyphicon glyphicon-briefcase lindale-icon-color"></span> {{ trans('header.project') }}</th>
                            <th><span class="glyphicon glyphicon-list-alt lindale-icon-color"></span> {{ trans('todo.todo-list') }}</th>
                            <th><i class="fa fa-refresh fa-spin fa-fw lindale-icon-color"></i> {{trans('todo.updated')}}</th>
                            <th><span class="glyphicon glyphicon-time lindale-icon-color"></span> {{trans('todo.created')}}</th>
                        </tr>

                        <tr>
                            <td>
                                {{ $todo->Initiator ? $todo->Initiator->name : trans('todo.initiator')}}
                            </td>
                            <td>
                                @if($todo->User != null){{ $todo->User->name }}@else{{ trans('project.none') }}@endif
                            </td>
                            <td>
                                {!! Colorable::label($todo->Type->color_id, trans($todo->Type->name)) !!}
                            </td>
                            <td>
                                {!! Colorable::label($todo->Status->color_id, trans($todo->Status->name)) !!}
                            </td>
                            <td>
                                @if($todo->Project()->count() > 0){{ $todo->Project->title }}@else{{ trans('project.none') }}@endif
                            </td>
                            <td>
                                @if($todo->TodoList != null){{ $todo->TodoList->title }}@else{{ trans('project.none') }}@endif
                            </td>
                            <td>
                                {{ $todo->updated_at }}
                            </td>
                            <td>
                                {{ $todo->created_at }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ $todo->content }}
                    </div>
                </div>
                <br>
                @if($todo->details)
                    <div class="jumbotron">
                        {!! markdown($todo->details) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>