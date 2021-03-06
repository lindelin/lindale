@extends('layouts.master')

@section('title')
    WIKI - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>{{ trans('wiki.submit') }}</h3>
                </div>
            </div>
            <hr>
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <form action="{{ url("project/$project->id/wiki") }}" method="post" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">

                            {{-- 词条 --}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label class="control-label">
                                        {{ trans('wiki.title') }}
                                    </label>
                                    <div>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
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
                                        <textarea class="form-control" rows="15" name="content" value="" data-provide="markdown" placeholder=" Markdown">{{ old('content') }}</textarea>
                                        @include('layouts.common.error-one', ['field' => 'content'])
                                    </div>
                                </div>
                            </div>

                            {{-- 图片 --}}
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="control-label">{{ trans('project.add-image') }}</label>
                                    @component('components.elements.form.file')
                                        image
                                    @endcomponent
                                    @include('layouts.common.error-one', ['field' => 'image'])
                                </div>
                            </div>

                            {{-- 索引 --}}
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                                    <label class="control-label">{{ trans('wiki.index') }}</label>
                                    <div>
                                        <select class="selectpicker form-control" name="type_id">
                                            <option value="{{ $DefaultType->id }}">{{ $DefaultType->name }}</option>
                                            @foreach( $types as $type)
                                                <option value="{{ $type->id }}" @if(old('type_id') == $type->id) selected @endif>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        @include('layouts.common.error-one', ['field' => 'type_id'])
                                    </div>
                                </div>
                            </div>

                        </div>

            			<button type="submit" class="btn btn-primary">{{ trans('wiki.submit') }}</button>
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