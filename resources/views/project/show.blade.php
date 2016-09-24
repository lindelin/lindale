@extends('layouts.master')

@section('title')
    SHOW
@endsection

@section('content')
    <h1>{{ $project->title }} <small>{{ $project->Type->name }}#{{ sprintf("%02d", $project->type_id).$project->user_id.$project->id }}</small></h1>
    <br>
    @include('layouts.Project.project-nav')
    @include('layouts.Project.delete-edit')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="panel panel-default" style="height: 120px;">
                <div class="panel-heading" style="{{ Colorable::lindale() }}">
                    <h5 class="panel-title">おしらせ</h5>
                </div>
                <div class="panel-body">
                    dfdsfsdfsdf
                </div>
            </div>
            <div class="panel panel-default" style="height: 300px;">
                <div class="panel-heading" style="{{ Colorable::lindale() }}">
                    <h5 class="panel-title">進捗状況</h5>
                </div>
                <div class="panel-body">

                </div>
            </div>
    	</div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading" style="{{ Colorable::lindale() }}">
                    <h5 class="panel-title">概要</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="#" class="thumbnail">
                                <img src="{{ asset('storage/'.$project->image) }}" alt="...">
                            </a>

                            {!! Markdown::toHtml($project->content) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" style="{{ Colorable::lindale() }}">
                    <h5 class="panel-title">ログ</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="#" class="thumbnail">
                                <img src="{{ asset('storage/'.$project->image) }}" alt="...">
                            </a>

                            {!! Markdown::toHtml($project->content) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection