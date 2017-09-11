<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="well well-home">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                @include('layouts.common.user-img', ['user_img' => $pm])
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4>
                            <a href="{{ url('profile/'.$pm->id) }}" class="lindale-color">
                                @if($pm->pivot->is_admin === config('admin.project_admin'))
                                    <span class="glyphicon glyphicon-bishop lindale-icon-color"></span>
                                @else
                                    <span class="glyphicon glyphicon-pawn lindale-icon-color"></span>
                                @endif
                                {{ $pm->name }}
                            </a>
                            <br>
                            <small>
                                {{ $pm->email }}
                            </small>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span class="glyphicon glyphicon-briefcase text-primary"></span>
                        {{ Counter::UserProjectCount($pm) }}
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span class="glyphicon glyphicon-tasks text-warning"></span>
                        {{ Counter::UserUnfinishedTaskCount($pm) }}
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span class="glyphicon glyphicon-check text-danger"></span>
                        {{ Counter::UserTodoUnfinishedCount($pm) }}
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <i class="fa fa-refresh fa-spin fa-fw lindale-icon-color"></i>
                <span class="lindale-color">{{ $pm->updated_at->diffForHumans() }}</span>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panel-title" align="right">
                @include('layouts.member.policy', ['member' => $pm])
                {{--<a href="#" class="my-tooltip" title="{{ trans('member.message') }}">
                    <span class="glyphicon glyphicon-envelope"></span>
                </a>　--}}
                @include('layouts.member.delete', ['remove_member' => $pm])
            </div>
        </div>
    </div>
</div>