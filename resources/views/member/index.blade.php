@extends('layouts.master')

@section('title')
    Member
@endsection

@section('content')
    <h3>{{ $project->title }} <small>{{ $project->Type->name }}#{{ sprintf("%02d", $project->type_id).$project->user_id.$project->id }}</small></h3>
    @include('layouts.Project.project-nav')
    <br>
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    {{ $pl->name }}


@endsection