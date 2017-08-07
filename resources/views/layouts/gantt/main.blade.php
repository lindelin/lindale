@section('head')
    <style>
        .weekend{ background: #eeeeee !important;}
        .warning-task{
            border:1px solid #f6f447;
            color:#f6f447;
            background: #f6f447;
        }
        .warning-task .gantt_task_progress{
            background:#d5d330;
        }
        .success-task{
            border:1px solid #43d43d;
            color: #43d43d;
            background: #43d43d;
        }
        .success-task .gantt_task_progress{
            background: #2fb529;
        }
        .danger-task{
            border:1px solid #f4474a;
            color: #f4474a;
            background: #f4474a;
        }
        .danger-task .gantt_task_progress{
            background: #d33033;
        }

        .info-task{
            border:1px solid #3d7ed3;
            color:#3d7ed3;
            background: #3d7ed3;
        }
        .info-task .gantt_task_progress{
            background: #2966b4;
        }
    </style>
@endsection

<script type="text/javascript" charset="UTF-8">
    // 现在时刻标记设置
    var date_to_str = gantt.date.date_to_str(gantt.config.task_date);
    var id = gantt.addMarker({ start_date: new Date(), css: "today", text: "Now", title:date_to_str( new Date())});
    setInterval(function(){
        var today = gantt.getMarker(id);
        today.start_date = new Date();
        today.title = date_to_str(today.start_date);
        gantt.updateMarker(id);
    }, 1000*60);
    // Json数据设置
    var tasks = {
        data:{!! $gantt['tasks'] !!},
        links:{!! $gantt['links'] !!}
    };
    // 左侧边栏设置
    gantt.config.columns = [
        {name:"text",       label:"{{ trans('header.tasks') }}",  width:"*", tree:true },
        {name:"start_date", label:"{{ trans('task.start_at') }}", align: "center" },
        {name:"duration",   label:"{{ trans('common.duration') }}",   align: "center" }
    ];
    // 子任务缩进设置
    gantt.templates.grid_indent=function(task){
        return "<div style='width:4px; float:left; height:100%'></div>"
    };
    // 任务条左侧显示内容
    gantt.templates.leftside_text = function(start, end, task){
        return "<b>【"+task.user+"】"+task.work_type+": </b>" +task.text;
    };
    // tooltip显示内容
    gantt.templates.tooltip_text = function(start,end,task){
        return "<b>{{ trans('header.tasks') }}:</b> "+
            task.text+
            "<br/><b>{{ trans('task.user') }}:</b> "+
            task.user+
            "<br/><b>{{ trans('header.progress') }}:</b> "+
            task.progress * 100 + '%' +
            "<br/><b>{{ trans('task.start_at') }}:</b> " +
            gantt.templates.tooltip_date_format(start)+
            "<br/><b>{{ trans('task.end_at') }}:</b> "+
            gantt.templates.tooltip_date_format(end);
    };
    // 任务条内显示文字
    gantt.templates.task_text=function(start,end,task){
        return '';
    };
    // 视图设置
    function setScaleConfig(value){
        switch (value) {
            case "1":
                gantt.config.scale_unit = "day";
                gantt.config.step = 1;
                gantt.config.date_scale = "%d（%M）";
                gantt.config.subscales = [];
                gantt.config.scale_height = 27;
                gantt.templates.date_scale = null;
                gantt.templates.task_cell_class = function(item,date){
                    if(date.getDay()==0||date.getDay()==6){
                        return "weekend"
                    }
                };
                break;
            case "2":
                var weekScaleTemplate = function(date){
                    var dateToStr = gantt.date.date_to_str("%m/%d");
                    var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
                    return dateToStr(date) + " - " + dateToStr(endDate);
                };
                gantt.config.scale_unit = "week";
                gantt.config.step = 1;
                gantt.templates.date_scale = weekScaleTemplate;
                gantt.config.subscales = [
                    {unit:"day", step:1, date:"%d（%D）" }
                ];
                gantt.config.scale_height = 50;
                gantt.templates.task_cell_class = function(item,date){
                    if(date.getDay()==0||date.getDay()==6){
                        return "weekend"
                    }
                };
                break;
            case "3":
                gantt.config.scale_unit = "month";
                gantt.config.date_scale = "%F, %Y";
                gantt.config.subscales = [
                    {unit:"day", step:1, date:"%j（%D）" }
                ];
                gantt.config.scale_height = 50;
                gantt.templates.date_scale = null;
                gantt.templates.task_cell_class = function(item,date){
                    if(date.getDay()==0||date.getDay()==6){
                        return "weekend"
                    }
                };
                break;
            case "4":
                gantt.config.scale_unit = "year";
                gantt.config.step = 1;
                gantt.config.date_scale = "%Y";
                gantt.config.scale_height = 50;
                gantt.templates.date_scale = null;
                gantt.config.subscales = [
                    {unit:"month", step:1, date:"%M" }
                ];
                gantt.templates.task_cell_class = function(item,date){
                    if(date.getDay()==0||date.getDay()==6){
                        return ""
                    }
                };
                break;
        }
    }
    // 初始视图
    setScaleConfig('4');
    // 任务类型
    gantt.templates.task_class  = function(start, end, task){
        switch (task.task_type){
            case 200:
                return "success-task";
                break;
            case 755:
                return "warning-task";
                break;
            case 300:
                return "info-task";
                break;
            case 777:
                return "danger-task";
                break;
            default :
                break;
        }
    };
    // PDF
    $(document).ready(function(){
        $('#toPdf').click(function () {
            gantt.exportToPDF({
                name:"gantt.pdf",
                header:"<h2>{{ $project->title }}</h2>",
                locale:"{{ trans_lang_for_gantt(session('lang')) }}",
                skin:'terrace'
            });
        });
    });
    // 排序
    gantt.config.sort = true;
    // 只读
    gantt.config.readonly = true;
    // 初始化
    gantt.init("gantt_here");
    // 导入数据
    gantt.parse (tasks);
    // 视图调整
    var func = function(e) {
        e = e || window.event;
        var el = e.target || e.srcElement;
        var value = el.value;
        setScaleConfig(value);
        gantt.render();
    };
    // 视图调整
    var els = document.getElementsByName("scale");
    for (var i = 0; i < els.length; i++) {
        els[i].onclick = func;
    }
    // TODO:チケット編集
    /*var dp = new dataProcessor("./gantt_data");
     dp.init(gantt);*/
</script>