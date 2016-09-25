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
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h2>{{ trans('wiki.edit-title') }}</h2>
                </div>
            </div>
            <hr>
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <form action="{{ url("project/$project->id/wiki/$wiki->id") }}" method="post" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="row">

                            {{-- 词条 --}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label class="control-label">
                                        {{ trans('wiki.title') }}
                                    </label>
                                    <div>
                                        <input type="text" class="form-control" name="title" value="{{ $wiki->title }}">
                                        @include('layouts.common.error-one', ['field' => 'title'])
                                    </div>
                                </div>
                            </div>

                            {{-- 内容 --}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label class="control-label">
                                        {{ trans('wiki.content') }}
                                    </label>
                                    <div>
                                        <textarea class="form-control" rows="15" name="content" value="" data-provide="markdown" placeholder=" Markdown">{{ $wiki->content }}</textarea>
                                        @include('layouts.common.error-one', ['field' => 'content'])
                                    </div>
                                </div>
                            </div>

                            {{-- 图片 --}}
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="control-label">{{ trans('project.add-image') }}</label>
                                    <input type="file" name="image">
                                    <p class="help-block">（ jpeg、png、bmp、gif、svg ）</p>
                                    @include('layouts.common.error-one', ['field' => 'image'])
                                </div>
                            </div>

                            {{-- 索引 --}}
                            @if($wiki->type_id != 0)
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                                        <label class="control-label">{{ trans('wiki.index') }}</label>
                                        <div>
                                            <select class="selectpicker form-control" name="type_id">
                                                <option value="{{ $DefaultType->id }}">{{ $DefaultType->name }}</option>
                                                @foreach( $types as $type)
                                                    <option value="{{ $type->id }}" @if($wiki->type_id == $type->id) selected @endif>{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                            @include('layouts.common.error-one', ['field' => 'type_id'])
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

            			<button type="submit" class="btn btn-primary">{{ trans('wiki.edit') }}</button>
            		</form>
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

@endsection