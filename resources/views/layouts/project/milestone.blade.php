<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-home">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4><span class="glyphicon glyphicon-signal lindale-icon-color"></span> {{ trans('project.milestone') }}</h4>
                </div>
            </div>
            <hr>
            @foreach ($project->TaskGroups()->latest()->take(10)->get() as $group)
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="{{ route('task.index', compact('project')) }}" style="color: #000;">
                                    <span class="glyphicon glyphicon-th-list lindale-icon-color"></span> {{ $group->title }}
                                </a>
                                <small class="{{ Colorable::textColorClass($group->Type->color_id) }}">
                                    {{ trans($group->Type->name) }}#{{ $group->id }}
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="progress" style="margin-bottom: 0;">
                                    <div class="progress-bar progress-bar-striped active {{ Colorable::progressColorClass($group->color_id) }}" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                                         style="width: {{ Calculator::TaskGroupProgressCompute($group) }}%">
                                        {{ Calculator::TaskGroupProgressCompute($group) }}% Complete
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>