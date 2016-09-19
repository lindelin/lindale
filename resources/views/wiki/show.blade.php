@extends('layouts.master')

@section('title')
    WIKI
@endsection

@section('content')
    <h3>{{ $project->title }} <small>{{ $project->Type->name }}#{{ sprintf("%02d", $project->type_id).$project->user_id.$project->id }}</small></h3>
    @include('layouts.Project.project-nav')
    <br>
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h2>{{ $wiki->title }}
                        <br><small>{{ $wiki->User->name }}</small>
                    </h2>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align="right">
                    @include('layouts.wiki.add-delete-edit')
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if($wiki->image)
                        <a href="#" class="thumbnail">
                            <img src="{{ asset('storage/'.$wiki->image) }}">
                        </a>
                    @endif
                    {!! Markdown::toHtml($wiki->content) !!}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            @include('layouts.wiki.side-index')
        </div>
    </div>

@endsection