@extends('layouts.master')

@section('title')
    HOME
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
                            <h4><strong>{{ $userProjectCont }}</strong><br> <small>Projects</small></h4>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                            <h4><strong>0</strong><br> <small>Tasks</small></h4>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                            <h4><strong>0</strong><br> <small>TODO</small></h4>
                        </div>
                	</div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">My Project</div>
                    <ul class="list-group">
                        @foreach($userProjects as $project)
                            <a href="{{ url("project/$project->id") }}" class="list-group-item">{{ $project->title }}</a>
                        @endforeach
                    </ul>
                </div>
          	</div>
          </div>
      </div>

      {{-- 手机对应视图 --}}
      @include('layouts.home.home-mobile')
      {{-- END --}}
  </div>

@endsection