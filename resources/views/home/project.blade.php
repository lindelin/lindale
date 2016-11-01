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
          @if($myProjects->count() > 0)
              <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <h3><small> Management of the projects</small></h3>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
                      <h3>
                          <small>
                              <a href="{{ $myProjects->previousPageUrl() }}" ><i class="fa fa-chevron-circle-left fa-lg" aria-hidden="true"></i></a>
                              　{{ $myProjects->currentPage() }}　
                              <a href="{{ $myProjects->nextPageUrl() }}"><i class="fa fa-chevron-circle-right fa-lg" aria-hidden="true"></i></a>
                          </small>
                      </h3>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="row">
                          @foreach($myProjects as $project)
                              <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                                  <div class="panel panel-default home-project-panel">
                                      <div class="panel-body home-project-card">
                                          <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <strong><a href="{{ url("project/$project->id") }}" class="{{ Colorable::randomTextColor() }}">{{ $project->title }}</a></strong>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <strong><a href="{{ url("project/$project->id") }}" class="{{ Colorable::randomTextColor() }}">@include('layouts.common.number.project')</a></strong>
                                              </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <strong>
                                                      <span class="glyphicon glyphicon-tasks"></span> 0/0&nbsp;&nbsp;&nbsp;
                                                      <span class="glyphicon glyphicon-check"></span> {{ $project->Todos()->where('status_id', Definer::FINISH_STATUS_ID)->count() }}/{{ $project->Todos()->count() }}&nbsp;&nbsp;&nbsp;
                                                      <span class="glyphicon glyphicon-calendar"></span> 0/0&nbsp;&nbsp;&nbsp;
                                                      <span class="glyphicon glyphicon-dashboard"></span> {{ $project->progress }}%&nbsp;&nbsp;&nbsp;
                                                  </strong>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  </div>
              </div>
          @endif
          @if($userProjects->count() > 0)
              <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <h3><small> Participated Projects</small></h3>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
                      <h3>
                          <small>
                              <a href="{{ $userProjects->previousPageUrl() }}" ><i class="fa fa-chevron-circle-left fa-lg" aria-hidden="true"></i></a>
                              　{{ $userProjects->currentPage() }}　
                              <a href="{{ $userProjects->nextPageUrl() }}"><i class="fa fa-chevron-circle-right fa-lg" aria-hidden="true"></i></a>
                          </small>
                      </h3>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="row">
                          @foreach($userProjects as $project)
                              <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                                  <div class="panel panel-default home-project-panel">
                                      <div class="panel-body home-project-card">
                                          <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <strong><a href="{{ url("project/$project->id") }}" class="{{ Colorable::randomTextColor() }}">{{ $project->title }}</a></strong>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <strong><a href="{{ url("project/$project->id") }}" class="{{ Colorable::randomTextColor() }}">@include('layouts.common.number.project')</a></strong>
                                              </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <strong>
                                                      <span class="glyphicon glyphicon-tasks"></span> 0/0&nbsp;&nbsp;&nbsp;
                                                      <span class="glyphicon glyphicon-check"></span> {{ $project->Todos()->where('status_id', Definer::FINISH_STATUS_ID)->count() }}/{{ $project->Todos()->count() }}&nbsp;&nbsp;&nbsp;
                                                      <span class="glyphicon glyphicon-calendar"></span> 0/0&nbsp;&nbsp;&nbsp;
                                                      <span class="glyphicon glyphicon-dashboard"></span> {{ $project->progress }}%&nbsp;&nbsp;&nbsp;
                                                  </strong>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  </div>
              </div>
          @endif
          @if($myProjects->count() === 0 and $userProjects->count() === 0)
              <div class="row">
                  <br>
                  <br>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                      <h1>{{ trans('project.none-project') }}</h1>
                      <br>
                      <a href="{{ url('project/create') }}" class="btn btn-group-lg btn-success">{{ trans('project.create-project') }}</a>
                  </div>
              </div>
          @endif
      </div>

      {{-- 手机对应视图 --}}
      @include('layouts.home.home-mobile')
      {{-- END --}}
  </div>

@endsection