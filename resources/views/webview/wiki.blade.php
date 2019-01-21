@extends('layouts.webkit')

@section('title')
    {{ $wiki->title }}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="lindale-color"><span class="glyphicon glyphicon-book lindale-icon-color"></span> {{ $wiki->title }}
                <br>
                <small>
                    {{ trans('wiki.writer') }}: {{ $wiki->User->name }}　
                    {{ trans('wiki.created') }}: {{ $wiki->created_at }}　
                </small>
            </h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if($wiki->image)
                <a href="{{ asset('storage/'.$wiki->image) }}" class="thumbnail">
                    <img src="{{ asset('storage/'.$wiki->image) }}">
                </a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive-div">
                {!! markdown($wiki->content) !!}
            </div>
        </div>
    </div>

    <script>
        $(document).ready($("table").addClass("table table-bordered"));
    </script>

@endsection