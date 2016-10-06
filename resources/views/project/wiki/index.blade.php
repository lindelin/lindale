@extends('layouts.master')

@section('title')
    WIKI
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    @if(!$HomeWiki)
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                <h1><span class="glyphicon glyphicon-book"></span></h1>
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
                        <h2>{{ $HomeWiki->title }}
                            <br>
                            <small>
                                {{ trans('wiki.writer') }}: {{ $HomeWiki->User->name }}　
                                {{ trans('wiki.created') }}: {{ $HomeWiki->created_at }}　
                            </small>
                        </h2>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align="right">
                    	@include('layouts.wiki.add-delete-edit', ['is_index' => 'index'])
                    </div>
                </div>
                <hr>
                <div class="row">
                	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        @if($HomeWiki->image)
                            <a href="#" class="thumbnail">
                                <img src="{{ asset('storage/'.$HomeWiki->image) }}">
                            </a>
                        @endif
                        <div class="table-responsive-div">
                            {!! Markdown::toHtml($HomeWiki->content) !!}
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