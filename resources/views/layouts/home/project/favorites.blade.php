<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <h4 class="lindale-color"><span class="glyphicon glyphicon-star lindale-icon-color"></span> お気に入り</h4>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
        <h4 class="remove-add">
            @include('layouts.home.favorites.remove')
            @include('layouts.home.favorites.add')
        </h4>
    </div>
</div>
@if(Auth::user()->favorites()->count() > 0)
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            @foreach(Auth::user()->favorites as $project)

                <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                    <div class="bs-callout home-project-card {{ Colorable::randomCallOutColor() }}">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="{{ url("project/$project->id") }}">
                                    <h4>
                                        {{ str_limit($project->title, 30) }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <strong><a href="{{ url("project/$project->id") }}" class="{{ Colorable::randomTextColor() }}">@include('layouts.common.number.project')</a></strong>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <strong>
                                    <span class="glyphicon glyphicon-tasks lindale-icon-color"></span> @include('layouts.common.progress.project-task-progress')&nbsp;&nbsp;&nbsp;
                                    <span class="glyphicon glyphicon-check lindale-icon-color"></span> @include('layouts.common.progress.project-todo-progress')&nbsp;&nbsp;&nbsp;
                                    {{--<span class="glyphicon glyphicon-calendar"></span> 0/0&nbsp;&nbsp;&nbsp;--}}
                                    <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ $project->progress }}%&nbsp;&nbsp;&nbsp;
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@else
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well well-home" style="height: 160px;padding-top: 64px;" align="center">
                <h4>
                    ありません
                </h4>
            </div>
        </div>
    </div>
@endif