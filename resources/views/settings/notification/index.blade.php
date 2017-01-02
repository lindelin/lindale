@extends('layouts.master')

@section('title')
    {{ trans('header.settings') }} - {{ config('app.title') }}
@endsection

@section('content')
    @include('layouts.common.errors-all')
    @include('layouts.common.succeed')

    <div class="row">
        {{-- 框架 --}}
        @include('layouts.settings.header')
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">

            {{-- Slack --}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('config.slack-notify') }}
                </div>
                <div class="panel-body">

                    <form action="{{ url('/settings/notification') }}" method="post" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="row">
                            {{-- 框架 --}}
                            <div class="col-xs-12 col-sm-11 col-md-10 col-lg-8">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                                        <a href="#" class="thumbnail">
                                            <img src="{{ asset('img/ico/Slack-icon.png') }}">
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                                        <h3>Slack</h3>
                                        <hr>
                                        <p>{{ trans('config.notifiable') }}</p>
                                        <div class="btn-group form-group" data-toggle="buttons">
                                            <label class="btn btn-default @if(old(UserConfig::SLACK_NOTIFICATION_NO) ? old(UserConfig::SLACK_NOTIFICATION_NO) :
                                                       UserConfig::get(Auth::user(), UserConfig::SLACK_NOTIFICATION_NO) == UserConfig::OFF)  active @endif">
                                                <input type="radio" name="{{ UserConfig::SLACK_NOTIFICATION_NO }}" value="{{ UserConfig::OFF }}" id="option1" autocomplete="off"
                                                       @if(old(UserConfig::SLACK_NOTIFICATION_NO) ? old(UserConfig::SLACK_NOTIFICATION_NO) :
                                                       UserConfig::get(Auth::user(), UserConfig::SLACK_NOTIFICATION_NO) == UserConfig::OFF)  checked @endif> OFF
                                            </label>
                                            <label class="btn btn-default @if(old(UserConfig::SLACK_NOTIFICATION_NO) ? old(UserConfig::SLACK_NOTIFICATION_NO) :
                                                       UserConfig::get(Auth::user(), UserConfig::SLACK_NOTIFICATION_NO) == UserConfig::ON)  active @endif">
                                                <input type="radio" name="{{ UserConfig::SLACK_NOTIFICATION_NO }}" value="{{ UserConfig::ON }}" id="option2" autocomplete="off"
                                                       @if(old(UserConfig::SLACK_NOTIFICATION_NO) ? old(UserConfig::SLACK_NOTIFICATION_NO) :
                                                       UserConfig::get(Auth::user(), UserConfig::SLACK_NOTIFICATION_NO) == UserConfig::ON)  checked @endif> ONf
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3" align="center">

                                    </div>
                                    <div class="col-xs-0 col-sm-7 col-md-8 col-lg-9">
                                    </div>
                                </div>

                                {{-- API Key --}}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has(UserConfig::SLACK_API_KEY) ? ' has-error' : '' }}">
                                            <label class="control-label">
                                                API Key
                                            </label>
                                            <div>
                                                <input type="text" class="form-control" name="{{ UserConfig::SLACK_API_KEY }}"
                                                       value="{{ old(UserConfig::SLACK_API_KEY) ? old(UserConfig::SLACK_API_KEY) : UserConfig::get(Auth::user(), UserConfig::SLACK_API_KEY) }}" />
                                                @include('layouts.common.error-one', ['field' => UserConfig::SLACK_API_KEY])
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
            {{-- Slack END --}}

        </div>
    </div>

@endsection