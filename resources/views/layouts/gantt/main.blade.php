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
    var date_to_str = gantt.date.date_to_str(gantt.config.task_date);

    var id = gantt.addMarker({ start_date: new Date(), css: "today", text: "Now", title:date_to_str( new Date())});
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
        {name:"text",       label:"{{ trans('header.tasks') }}",  width:"*", tree:true },
        {name:"start_date", label:"{{ trans('task.start_at') }}", align: "center" },
        {name:"duration",   label:"Duration",   align: "center" }
    ];
    gantt.templates.grid_indent=function(task){
        return "<div style='width:4px; float:left; height:100%'></div>"
    };

    /*gantt.templates.tooltip_text = function(start,end,task){
        return "<b>Task:</b> "+task.text+"<br/><b>Start:</b> " + task.start_date;
    };*/

    gantt.templates.task_text=function(start,end,task){
        return '';
    };

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

    setScaleConfig('4');

    /*gantt.config.scale_unit = "month";
    gantt.config.date_scale = "%F, %Y";
    gantt.config.scale_height = 50;
    gantt.config.subscales = [
        {unit:"day", step:1, date:"%j（%D）" }
    ];*/


    gantt.templates.task_class  = function(start, end, task){
        switch (task.task_type){
            case 1:
                return "success-task";
                break;
            case 2:
                return "warning-task";
                break;
            case 0:
                return "info-task";
                break;
            case 777:
                return "danger-task";
                break;
            default :
                break;
        }
    };
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

    /*var dp = new dataProcessor("./gantt_data");
     dp.init(gantt);*/
</script>