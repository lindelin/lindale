@extends('layouts.master')

@section('title')
    {{ $wiki->title }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-8 col-lg-9">
                    <h3 class="lindale-color"><span class="glyphicon glyphicon-book lindale-icon-color"></span> {{ $wiki->title }}
                        <br>
                        <small>
                            {{ trans('wiki.writer') }}: {{ $wiki->User->name }}　
                            {{ trans('wiki.created') }}: {{ $wiki->created_at }}　
                        </small>
                    </h3>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-4 col-lg-3" align="right">
                    @include('layouts.wiki.add-delete-edit')
                </div>
            </div>
            <hr>
            <div class="row">
            	<div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
                    @if($wiki->image)
                        <a href="#" class="thumbnail">
                            <img src="{{ asset('storage/'.$wiki->image) }}">
                        </a>
                    @endif
            	</div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="table-responsive-div">
                        {!! markdown($wiki->content) !!}
                    </div>
                </div>
            </div>
        </div>
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <br class="visible-xs-block">
            <br class="visible-xs-block">
            <br class="visible-xs-block">
            @include('layouts.wiki.side-index')
        </div>
    </div>

    <script>
        $(document).ready($("table").addClass("table table-bordered"));
    </script>

@endsection