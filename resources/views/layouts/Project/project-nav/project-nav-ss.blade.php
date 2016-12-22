<div class="row visible-xs-block">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="nav nav-tabs" role="tablist">

            <li role="presentation" class="dropdown @include('layouts.Project.project-nav.nav-selected-ss')">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-th"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li role="presentation">
                        <a href="{{ $top_url }}">
                            <span class="glyphicon glyphicon-th-large"></span> {{ trans('header.top') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="{{ $member_url }}">
                            <span class="glyphicon glyphicon-user"></span> {{ trans('header.member') }}
                        </a>
                    </li>
                   {{-- <li role="presentation">
                        <a href="{{ $bbs_url }}">
                            <span class="glyphicon glyphicon-comment"></span> {{ trans('header.bbs') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="{{ $achievement_url }}">
                            <span class="glyphicon glyphicon-stats"></span> {{ trans('header.achievement') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="{{ $budget_url }}">
                            <span class="glyphicon glyphicon-piggy-bank"></span> {{ trans('header.budget') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="{{ $concept_url }}">
                            <span class="glyphicon glyphicon-pushpin"></span> {{ trans('header.concept') }}
                        </a>
                    </li>--}}
                    <li role="presentation">
                        <a href="{{ $config_url }}">
                            <span class="glyphicon glyphicon-cog"></span> {{ trans('header.config') }}
                        </a>
                    </li>
                </ul>
            </li>

            <li role="presentation" @if($selected == "info") class="active" @endif>
                <a href="{{ $info_url }}">
                    <span class="glyphicon glyphicon-info-sign"></span>
                </a>
            </li>

            <li role="presentation" @if($selected == "tasks") class="active" @endif>
                <a href="{{ $tasks_url }}">
                    <span class="glyphicon glyphicon-tasks"></span>
                </a>
            </li>

            <li role="presentation" @if($selected == "todo") class="active" @endif>
                <a href="{{ $todo_url }}">
                    <span class="glyphicon glyphicon-check"></span>
                </a>
            </li>

            <li role="presentation" @if($selected == "progress") class="active" @endif>
                <a href="{{ $progress_url }}">
                    <span class="glyphicon glyphicon-dashboard"></span>
                </a>
            </li>

            <li role="presentation" @if($selected == "wiki") class="active" @endif>
                <a href="{{ $wiki_url }}">
                    <span class="glyphicon glyphicon-book"></span>
                </a>
            </li>


        </ul>
    </div>
</div>