@extends('layouts.master-no-vue')

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
                @endslot

                    <div id="gantt_here" style='width:100%; height:720px;'></div>

                    <script type="text/javascript">
                        var tasks = {
                            data:[
                                {id:1, text:"Project #1",start_date:"01-04-2013", duration:11,
                                    progress: 0.6, open: true},
                                {id:2, text:"Task #1",   start_date:"03-04-2013", duration:5,
                                    progress: 1,   open: true, parent:1},
                                {id:3, text:"Task #2",   start_date:"02-04-2013", duration:7,
                                    progress: 0.5, open: true, parent:1},
                                {id:4, text:"Task #2.1", start_date:"03-04-2013", duration:2,
                                    progress: 1,   open: true, parent:3},
                                {id:5, text:"Task #2.2", start_date:"04-04-2013", duration:3,
                                    progress: 0.8, open: true, parent:3},
                                {id:6, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:7, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:8, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:9, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:10, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:11, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:12, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:13, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:14, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:15, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:16, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:17, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:18, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:19, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:20, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:21, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:22, text:"Task #2.3", start_date:"05-04-2013", duration:4,
                                    progress: 0.2, open: true, parent:3},
                                {id:23, text:"Task #2.3", start_date:"05-04-2013", duration:100,
                                    progress: 0.2, open: true, parent:3}
                            ],
                            links:[
                                {id:1, source:1, target:2, type:"1"},
                                {id:2, source:1, target:3, type:"1"},
                                {id:3, source:3, target:4, type:"1"},
                                {id:4, source:4, target:5, type:"0"},
                                {id:5, source:5, target:6, type:"0"}
                            ]
                        };
                        gantt.init("gantt_here");
                        gantt.parse (tasks);

                        /*var dp = new dataProcessor("./gantt_data");
                         dp.init(gantt);*/
                    </script>
            @endcomponent
        </div>
    </div>

@endsection
