@extends('layouts.master')

@section('title')
    WIKI - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    @if(!$HomeWiki)
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                <h1><span class="glyphicon glyphicon-book lindale-icon-color"></span></h1>
                <h2>Welcome to the project wiki!</h2>
                <h4>{{ trans('wiki.none-wiki') }}</h4>
                <br>
                <form action="{{ url("project/$project->id/wiki/first") }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">{{ trans('wiki.first-wiki') }}</button>
                </form>
        	</div>
        </div>
    @else
        <div class="row">
            {{-- 框架 --}}
        	<div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <h3 class="lindale-color"><span class="glyphicon glyphicon-book lindale-icon-color"></span> {{ $HomeWiki->title }}
                            <br>
                            <small>
                                {{ trans('wiki.writer') }}: {{ $HomeWiki->User->name }}　
                                {{ trans('wiki.created') }}: {{ $HomeWiki->created_at }}　
                            </small>
                        </h3>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align="right">
                    	@include('layouts.wiki.add-delete-edit', ['is_index' => 'index'])
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
                        @if($HomeWiki->image)
                            <a href="#" class="thumbnail">
                                <img src="{{ asset('storage/'.$HomeWiki->image) }}">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="row">
                	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive-div">
                            {!! markdown($HomeWiki->content) !!}
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
    @endif

    <script>
        $(document).ready($("table").addClass("table table-bordered"));
    </script>

@endsection