@extends('layouts.master')

@section('title')
    {{ trans('header.config') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        @include('layouts.config.header')

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            {{-- 语言和地区 --}}
            <div class="well well-home">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4><span class="glyphicon glyphicon-globe lindale-icon-color"></span> {{ trans('config.locale') }}</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="{{ url('project/'.$project->id.'/config/locale') }}" method="post" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="row">
                                {{-- 框架 --}}
                                <div class="col-xs-12 col-sm-11 col-md-10 col-lg-8">

                                    {{-- 项目语言设置 --}}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group{{ $errors->has(ProjectConfig::LANG) ? ' has-error' : '' }}">
                                                <label class="control-label">{{ trans('project.lang') }}</label>
                                                <div>
                                                    <select class="selectpicker form-control" name="{{ ProjectConfig::LANG }}">
                                                        @foreach( Config::get('app.available_locales') as $value)
                                                            <option value="{{ $value }}" @if(old(ProjectConfig::LANG) ? old(ProjectConfig::LANG) : ProjectConfig::get($project, ProjectConfig::LANG) == $value)  selected @endif>
                                                                {{ Config::get('app.available_language')[$value] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @include('layouts.common.error-one', ['field' => ProjectConfig::LANG])
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <button type="submit" class="btn btn-warning">
                                                {{ trans('config.save') }}
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                {{-- 框架 --}}
                                <div class="col-xs-0 col-sm-1 col-md-2 col-lg-4">

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection