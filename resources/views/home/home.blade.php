@extends('layouts.master')

@section('title')
    HOME
@endsection

@section('content')

  <div class="row">
      {{-- 框架 --}}
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hidden-xs">

         <div class="row">
         	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if(Auth::user()->photo != '')
                    <a href="#" class="thumbnail">
                        <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="个人资料">
                    </a>
                @else
                    <a href="#" class="thumbnail">
                        <img src="{{ asset('img/admin.png') }}" alt="个人资料">
                    </a>
                @endif
         	</div>
         </div>

          <div class="row">
          	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>{{ Auth::user()->name }}<br> <small>{{ Auth::user()->email }}</small></h2>
          	</div>
          </div>

          <div class="row">
          	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if(Auth::user()->content)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ Auth::user()->content }}
                        </div>
                    </div>
                @else
                    <div class="list-group">
                        <a href="#" class="list-group-item"><span class="glyphicon glyphicon-plus"></span> 添加自我介绍</a>
                    </div>
                @endif
          	</div>
          </div>

          <div class="row">
          	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          		<a href="#" class="btn btn-success btn-block">编辑个人资料</a>
          	</div>
          </div>
          <hr>

      </div>
      {{-- 框架 --}}
      <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 hidden-xs">
          <ul class="nav nav-tabs nav-justified" role="tablist">
              <li role="presentation" class="active"><a href="#">Home</a></li>
              <li role="presentation"><a href="#">Profile</a></li>
              <li role="presentation"><a href="#">Messages</a></li>
          </ul>
          {{--<div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Panel title</h3>
              </div>
              <div class="panel-body">
                  Panel body
              </div>
          </div>--}}
      </div>

      {{-- 手机对应视图 --}}
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-xs-block">

          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active" style="width: 50%;"><a href="#"><div align="center">Home</div></a></li>
                      <li role="presentation" style="width: 50%;"><a href="#"><div align="center">Project</div></a></li>
                  </ul>
              </div>
          </div>
          <br>

          <div class="row">
          	<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                @if(Auth::user()->photo != '')
                    <a href="#" class="thumbnail">
                        <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="个人资料">
                    </a>
                @else
                    <a href="#" class="thumbnail">
                        <img src="{{ asset('img/admin.png') }}" alt="个人资料">
                    </a>
                @endif
          	</div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <h4>{{ Auth::user()->name }}<br> <small>{{ Auth::user()->email }}</small></h4>
            </div>
          </div>
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                              <h4><strong>30</strong><br> <small>Project</small></h4>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                              <h4><strong>30</strong><br> <small>Tasks</small></h4>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
                              <h4><strong>30</strong><br> <small>To-Do</small></h4>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
          	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Panel title</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div>
          	</div>
          </div>

      </div>
  </div>

@endsection