@extends('layouts.master')

@section('title')
    {{ trans('header.achievement') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    @include('layouts.achievement.title')

    @component('components.panels.default-title')
        @slot('heading')
            <h2 class="panel-title">
                <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;
                <span>{{ $project->openEvaluationCount() }}</span>&nbsp;
                <a href="{{ route('evaluation', compact('project')) }}">Open</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="glyphicon glyphicon-ok"></span>&nbsp;
                <span style="color: #28a745;">{{ $project->closedEvaluationCount() }}</span>&nbsp;
                <a href="{{ route('evaluation.closed', compact('project')) }}" style="color: #28a745;">Closed</a>
            </h2>
        @endslot

        @if ($evaluations->count() > 0)
            <br>
            @foreach($evaluations as $evaluation)
                @include('layouts.achievement.evaluation.closed-detail')
            @endforeach
        @else
            @include('layouts.achievement.evaluation.no-evaluation')
        @endif

    @endcomponent

@endsection
