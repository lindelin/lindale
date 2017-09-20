<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                @include('layouts.common.user-img', ['user_img' => $evaluation->User])
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4 style="margin-top: 0;">
                            {{ $evaluation->User->name }}：
                            <a href="{{ route('task.show', ['project' => $project, 'task' => $evaluation->task]) }}">
                                #{{ sprintf("%07d", $evaluation->task->id) }} {{ $evaluation->task->title }}
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h5 style="margin-top: 0;">
                            {{ trans('achievement.reviewer') }}：{{ $evaluation->reviewer->name }}
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        @for($count = 0; $count < $evaluation->evaluation; $count++)
                            <span class="glyphicon glyphicon-star"></span>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>