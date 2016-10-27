@extends('layouts.master')

@section('title')
    {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="panel panel-default" style="height: 120px;">
                <div class="panel-heading" style="{{ Colorable::lindale() }}">
                    <h5 class="panel-title">おしらせ</h5>
                </div>
                <div class="panel-body">
                    2016年10月27日　システムプレビュー版リリースしました！
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