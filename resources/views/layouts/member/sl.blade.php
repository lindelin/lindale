<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="well well-home">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                @include('layouts.common.user-img', ['user_img' => $sl])
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4>
                            <a href="#" class="lindale-color">
                                <span class="glyphicon glyphicon-queen lindale-icon-color"></span>
                                {{ $sl->name }}
                            </a>
                            <br>
                            <small>
                                {{ $sl->email }}
                            </small>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span class="glyphicon glyphicon-briefcase text-primary"></span>
                        {{ Counter::UserProjectCount($sl) }}
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span class="glyphicon glyphicon-tasks text-warning"></span>
                        {{ Counter::UserUnfinishedTaskCount($sl) }}
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span class="glyphicon glyphicon-check text-danger"></span>
                        {{ Counter::UserTodoUnfinishedCount($sl) }}
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <i class="fa fa-refresh fa-spin fa-fw lindale-icon-color"></i>
                <span class="lindale-color">{{ $sl->updated_at->diffForHumans() }}</span>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panel-title" align="right">
                {{--<a href="#" class="my-tooltip" title="{{ trans('member.message') }}">
                    <span class="glyphicon glyphicon-envelope"></span>
                </a>--}}
            </div>
        </div>
    </div>
</div>