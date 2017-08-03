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

                    <style>
                        .weekend{ background: #f4f7f4 !important;}
                    </style>

                    <div id="gantt_here" style='width:100%; height:720px;'></div>

                    <script type="text/javascript">
                        var date_to_str = gantt.date.date_to_str(gantt.config.task_date);

                        var id = gantt.addMarker({ start_date: new Date(), css: "today", title:date_to_str( new Date())});
                        setInterval(function(){
                            var today = gantt.getMarker(id);
                            today.start_date = new Date();
                            today.title = date_to_str(today.start_date);
                            gantt.updateMarker(id);
                        }, 1000*60);
                        var tasks = {
                            data:{!! $gantt !!}
                        };
                        gantt.config.columns = [
                            {name:"text",       label:"Task name",  width:"*", tree:true },
                            {name:"start_date", label:"Start time", align: "center" },
                            {name:"duration",   label:"Duration",   align: "center" }
                        ];
                        gantt.templates.grid_indent=function(task){
                            return "<div style='width:4px; float:left; height:100%'></div>"
                        };
                        gantt.config.order_branch = true;
                        gantt.config.sort = true;
                        gantt.templates.scale_cell_class = function(date){
                            if(date.getDay()==0||date.getDay()==6){
                                return "weekend";
                            }
                        };
                        gantt.templates.task_cell_class = function(item,date){
                            if(date.getDay()==0||date.getDay()==6){
                                return "weekend" ;
                            }
                        };
                        gantt.templates.task_text=function(start,end,task){
                            return "<b>Text:</b> "+task.text+",<b> User:</b> "+task.user;
                        };
                        gantt.config.readonly = true;
                        gantt.init("gantt_here");
                        gantt.parse (tasks);

                        /*var dp = new dataProcessor("./gantt_data");
                         dp.init(gantt);*/
                    </script>
            @endcomponent
        </div>
    </div>

@endsection
