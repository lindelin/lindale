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
                <span style="color: #dc3545;">{{ $project->openEvaluationCount() }}</span>&nbsp;
                <a href="{{ route('evaluation', compact('project')) }}" style="color: #dc3545;">Open</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="glyphicon glyphicon-ok"></span>&nbsp;
                <span>{{ $project->closedEvaluationCount() }}</span>&nbsp;
                <a href="{{ route('evaluation.closed', compact('project')) }}">Closed</a>
            </h2>
        @endslot

        @if ($evaluations->count() > 0)
            <br>
            @foreach($evaluations as $evaluation)
                @include('layouts.achievement.evaluation.detail')
            @endforeach
        @else
            @include('layouts.achievement.evaluation.no-evaluation')
        @endif

    @endcomponent

@endsection
