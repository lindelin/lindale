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
                {!! $memberOverviewBar->render() !!}
            @endcomponent
        </div>
    </div>
    
    @include('layouts.progress.member-card', ['project' => $project, 'user' => $projectLeader])
    @include('layouts.progress.member-card', ['project' => $project, 'user' => $subLeader])



    @foreach($users as $user)
        @include('layouts.progress.member-card', compact('project', 'user'))
    @endforeach

@endsection
