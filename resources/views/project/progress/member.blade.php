@extends('layouts.master')

@section('title')
    {{ trans('header.progress') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    @include('layouts.progress.title')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @component('components.panels.default')
                {!! Graphs::memberOverviewTaskBar($project)->render() !!}
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
    
    @include('layouts.progress.member-card', ['project' => $project, 'user' => $projectLeader])
    @if($subLeader)
        @include('layouts.progress.member-card', ['project' => $project, 'user' => $subLeader])
    @endif
    @if($users->count() > 0)
        @foreach($users as $user)
            @include('layouts.progress.member-card', compact('project', 'user'))
        @endforeach
    @endif

@endsection
