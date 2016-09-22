@extends('layouts.master')

@section('title')
    HOME
@endsection

@section('content')

  <div class="row">
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <div class="panel panel-default">
          	  <div class="panel-heading">
          			<h3 class="panel-title">Panel title</h3>
          	  </div>
          	  <div class="panel-body">
          			Panel body
          	  </div>
          </div>
      </div>

      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Panel title</h3>
              </div>
              <div class="panel-body">
                  Panel body
              </div>
          </div>
      </div>
  </div>

@endsection