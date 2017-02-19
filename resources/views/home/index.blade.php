@extends('layouts.master')

@section('title')
    {{ trans('header.home') }} - {{ config('app.title') }}
@endsection

@section('content')

  <div class="row">
      {{-- 框架 --}}
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hidden-xs">
          @include('layouts.home.profile')
      </div>
      {{-- 框架 --}}
      <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 hidden-xs">

          <div class="row">
          	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @include('layouts.home.nav')
          	</div>
          </div>
          <br>
          <br>
          <div class="row">
          	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                	<div class="panel-body">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                            <h4>
                                <strong>
                                    <a href="{{ url('/home/project') }}" style="color: #000000;">
                                        {{ $userProjectCount }}
                                    </a>
                                </strong>
                                <br>
                                <small>
                                    Projects
                                </small>
                            </h4>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                            <h4>
                                <strong>
                                    <a href="{{ url('/task') }}" style="color: #000000;">
                                        {{ \App\Counter::UserUnfinishedTaskCount(Auth::user()) }}
                                    </a>
                                </strong>
                                <br>
                                <small>
                                    Tasks
                                </small>
                            </h4>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                            <h4>
                                <strong>
                                    <a href="{{ url('/todo') }}" style="color: #000000;">
                                        {{ \App\Counter::UserTodoUnfinishedCount(Auth::user()) }}
                                    </a>
                                </strong>
                                <br>
                                <small>
                                    TODO
                                </small>
                            </h4>
                        </div>
                	</div>
                </div>

          	</div>
          </div>

          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="panel panel-default">
                      <div class="panel-body">

                          <div class="row">
                              <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                                  <span class="glyphicon glyphicon-tasks"></span> {{ trans('header.tasks').trans('header.progress') }}
                              </div>
                              <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                                  <div class="progress">
                                      <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {{ Calculator::UserTaskProgressCompute(Auth::user()) }}%">
                                          {{ Calculator::UserTaskProgressCompute(Auth::user()) }}% Complete
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3">
                                  <span class="glyphicon glyphicon-check"></span> TODO{{ trans('header.progress') }}
                              </div>
                              <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9">
                                  <div class="progress" style="margin-bottom: 0px;">
                                      <div class="progress-bar progress-bar-danger progress-bar-striped active"  style="width: {{ Calculator::UserTodoProgressCompute(Auth::user()) }}%">
                                          {{ Calculator::UserTodoProgressCompute(Auth::user()) }}% Complete
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>
          </div>

      </div>

      {{-- 手机对应视图 --}}
      @include('layouts.home.home-mobile')
      {{-- END --}}
  </div>

@endsection