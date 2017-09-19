@extends('layouts.master')

@section('title')
    {{ trans('header.achievement') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    @include('layouts.achievement.title')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @component('components.panels.default')
                {!! Graphs::memberAchievementTaskBar($project)->render() !!}
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @component('components.panels.default')
                {!! Graphs::memberOverviewTodoBar($project)->render() !!}
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @component('components.panels.default')
                {!! Graphs::memberAchievementStarBar($project)->render() !!}
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @component('components.panels.default')
                {!! Graphs::memberAchievementCostSpendBar($project)->render() !!}
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @component('components.panels.default')
                {!! Graphs::memberAchievementContributionBar($project)->render() !!}
            @endcomponent
        </div>
    </div>
@endsection
