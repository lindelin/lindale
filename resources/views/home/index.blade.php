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

          @include('layouts.home.nav')
          <br>
          <br>
          @include('layouts.home.status-bar')
          @include('layouts.home.progress-bar')
          @include('layouts.home.progress-status')

      </div>

      {{-- 手机对应视图 --}}
      @include('layouts.home.home-mobile')
      {{-- END --}}

  </div>

@endsection