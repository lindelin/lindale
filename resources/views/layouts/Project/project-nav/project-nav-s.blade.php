<div class="row visible-sm-block">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" @if($selected == "top") class="active" @endif>
                <a href="{{ url("project/$project->id") }}">
                    <span class="glyphicon glyphicon-th-large"></span> {{ trans('header.top') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "info") class="active" @endif>
                <a href="#">
                    <span class="glyphicon glyphicon-info-sign"></span> {{ trans('header.info') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "progress") class="active" @endif>
                <a href="#">
                    <span class="glyphicon glyphicon-dashboard"></span> {{ trans('header.progress') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "tasks") class="active" @endif>
                <a href="#">
                    <span class="glyphicon glyphicon-tasks"></span> {{ trans('header.tasks') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "todo") class="active" @endif>
                <a href="#">
                    <span class="glyphicon glyphicon-check"></span> To-Do
                </a>
            </li>
            <li role="presentation" @if($selected == "concept") class="active" @endif>
                <a href="#">
                    <span class="glyphicon glyphicon-pushpin"></span> {{ trans('header.concept') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "wiki") class="active" @endif>
                <a href="{{ url("project/$project->id/wiki") }}">
                    <span class="glyphicon glyphicon-book"></span> Wiki
                </a>
            </li>
            <li role="presentation" class="dropdown @include('layouts.Project.project-nav.nav-selected-s')">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-th"></span> {{ trans('header.other') }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li role="presentation">
                        <a href="#">
                            <span class="glyphicon glyphicon-user"></span> {{ trans('header.member') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#">
                            <span class="glyphicon glyphicon-comment"></span> {{ trans('header.bbs') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#">
                            <span class="glyphicon glyphicon-stats"></span> {{ trans('header.achievement') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#">
                            <span class="glyphicon glyphicon-piggy-bank"></span> {{ trans('header.budget') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#">
                            <span class="glyphicon glyphicon-cog"></span> {{ trans('header.config') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>