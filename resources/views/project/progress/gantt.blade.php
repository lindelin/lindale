@extends('layouts.gantt')

@section('title')
    {{ trans('header.progress') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.project.common.project-header')

    @include('layouts.progress.title')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @component('components.well')
                @slot('title')
                    <i class="fa fa-tasks fa-lg lindale-icon-color" aria-hidden="true"></i> {{ trans('progress.gantt') }}
                    <small>
                        <a href="{{ route('progress.gantt-full', compact('project')) }}" class="btn btn-success btn-xs">
                            全画面表示
                        </a>
                    </small>
                @endslot

                <div id="gantt_here" style="width:100%"></div>

                <script type="text/javascript" charset="UTF-8">
                    $('#gantt_here').css('height', '720px');
                </script>

                @include('layouts.gantt.main')

            @endcomponent
        </div>
    </div>

@endsection
