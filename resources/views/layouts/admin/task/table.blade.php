<div class="row">
    <div class="col-md-12">
        <div class="tabbable" id="tabs-600587">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#panel-522154" data-toggle="tab">{{ trans('task.all') }}</a>
                </li>
                <li>
                    <a href="#panel-173009" data-toggle="tab">{{ trans('task.my-tasks') }}</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="panel-522154">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        {{ trans('task.name') }}
                                    </th>
                                    <th>
                                        {{ trans('task.type') }}
                                    </th>
                                    <th>
                                        {{ trans('task.user') }}
                                    </th>
                                    <th>
                                        {{ trans('task.status') }}
                                    </th>
                                    <th>
                                        {{ trans('task.progress') }}
                                    </th>
                                    <th>
                                        {{ trans('task.deadline') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($tasks as $task )
                                    <tr >
                                        <td>
                                            {{ $task->id }}
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/task/'.$task->id) }}">{{ $task->name }}</a>
                                        </td>
                                        <td>
                                            {{ $task->Type->name }}
                                        </td>
                                        <td>
                                            {{ $task->User->name }}
                                        </td>
                                        <td>
                                            {{ $task->Status->name }}
                                        </td>
                                        <td style="width: 200px;">
                                            <div class="progress" style="margin-bottom: 0px;">
                                                <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: {{ $task->progress }}%">{{ $task->progress }}%</div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $task->deadline }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="panel-173009">
                    <p>
                        Howdy, I'm in Section 2.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>