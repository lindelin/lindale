<div class="row visible-lg-block">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" @if($selected == "top") class="active" @endif>
                <a href="{{ $top_url }}">
                    <span class="glyphicon glyphicon-th-large"></span> {{ trans('header.top') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "info") class="active" @endif>
                <a href="{{ $info_url }}">
                    <span class="glyphicon glyphicon-info-sign"></span> {{ trans('header.info') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "progress") class="active" @endif>
                <a href="{{ $progress_url }}">
                    <span class="glyphicon glyphicon-dashboard"></span> {{ trans('header.progress') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "tasks") class="active" @endif>
                <a href="{{ $tasks_url }}">
                    <span class="glyphicon glyphicon-tasks"></span> {{ trans('header.tasks') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "todo") class="active" @endif>
                <a href="{{ $todo_url }}">
                    <span class="glyphicon glyphicon-check"></span> TODO
                </a>
            </li>
            <li role="presentation" @if($selected == "member") class="active" @endif>
                <a href="{{ $member_url }}">
                    <span class="glyphicon glyphicon-user"></span> {{ trans('header.member') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "achievement") class="active" @endif>
                <a href="{{ $achievement_url }}">
                    <span class="glyphicon glyphicon-stats"></span> {{ trans('header.achievement') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "budget") class="active" @endif>
                <a href="{{ $budget_url }}">
                    <span class="glyphicon glyphicon-piggy-bank"></span> {{ trans('header.budget') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "bbs") class="active" @endif>
                <a href="{{ $bbs_url }}">
                    <span class="glyphicon glyphicon-comment"></span> {{ trans('header.bbs') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "concept") class="active" @endif>
                <a href="{{ $concept_url }}">
                    <span class="glyphicon glyphicon-pushpin"></span> {{ trans('header.concept') }}
                </a>
            </li>
            <li role="presentation" @if($selected == "wiki") class="active" @endif>
                <a href="{{ $wiki_url }}">
                    <span class="glyphicon glyphicon-book"></span> Wiki
                </a>
            </li>
            <li role="presentation" @if($selected == "config") class="active" @endif>
                <a href="{{ $config_url }}">
                    <span class="glyphicon glyphicon-cog"></span> {{ trans('header.config') }}
                </a>
            </li>
        </ul>
    </div>
</div>