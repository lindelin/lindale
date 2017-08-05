@extends('layouts.gantt-full')

@section('title')
    {{ trans('progress.gantt') }} - {{ trans('header.progress') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <a href="{{ route('progress.gantt', compact('project')) }}" class="btn btn-success btn-lg">
                    <span class="glyphicon glyphicon-arrow-left"></span>
                </a>
                <button type="button" onclick='gantt.exportToPDF()' class="btn btn-success btn-lg">
                    <span class="glyphicon glyphicon-print"></span>
                </button>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 hidden-xs hidden-sm" align="center">
                <h3>
                    {{ trans('progress.gantt') }}
                </h3>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label class="radio-inline">
                            <input type="radio" id="scale1" name="scale" value="1"><label for="scale1">Day scale</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="scale2" name="scale" value="2"><label for="scale2">Week scale</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="scale3" name="scale" value="3"><label for="scale3">Month scale</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="scale4" name="scale" value="4" checked><label for="scale4">Year scale</label>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div id="gantt_here" style="width:100%"></div>
            <script type="text/javascript" charset="UTF-8">
                var height = $(window).height() - 96 - 25;
                $('#gantt_here').css('height', height);
            </script>

            @include('layouts.gantt.main')

        </div>
    </div>

@endsection
