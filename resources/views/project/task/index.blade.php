@extends('layouts.master')

@section('title')
    {{ trans('header.tasks') }} - {{ $project->title }} - {{ config('app.title') }}
@endsection

@section('content')

    @include('layouts.Project.common.project-header')

    <div class="row">
        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">

            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h3 class="lindale-color">
                        <span class="glyphicon glyphicon-tasks lindale-icon-color"></span>
                        {{ trans('header.tasks') }}
                    </h3>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align="right">
                    @include('layouts.task.add')
                </div>
            </div>
            <hr>

            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        @foreach($groups as $group)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading{{ $group->id }}">
                                    @include('layouts.task.group.group-panel.heading')
                                </div>
                                <div id="collapse{{ $group->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $group->id }}">
                                    <div class="panel-body">
                                        @include('layouts.task.group.group-panel.body')
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach

                    </div>
            	</div>
            </div>

            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
            		{{ $groups->links() }}
            	</div>
            </div>

        </div>

        {{-- 框架 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    @include('layouts.task.common.menu')

            	</div>
            </div>

        </div>
    </div>

@endsection