<script type="text/javascript">
    $(function () {
        var {{ $model->id }} = new Highcharts.Chart({
            chart: {
                renderTo: "{{ $model->id }}",
                @include('charts::_partials.dimension.js2')
            },
            @if($model->title)
                title: {
                    text:  "{!! $model->title !!}",
                    x: -20 //center
                },
            @endif
            @if(!$model->credits)
                credits: {
                    enabled: false
                },
            @endif
            xAxis: {
                categories: [
                @foreach($model->labels as $label)
                    "{!! $label !!}",
                @endforeach
            ]
            },
            yAxis: {
                plotLines: [{
                    value: 0,
                    height: 0.5,
                    width: 1,
                    color: '#808080'
                }]
            },

            legend: {
                @if(!$model->legend)
                    enabled: false,
                @endif
            },
            series: [
                @for ($i = 0; $i < count($model->datasets); $i++)
                    {
                        name:  "{{ $model->datasets[$i]['label'] }}",
                        @if($model->colors && count($model->colors) > $i)
                            color: "{{ $model->colors[$i] }}",
                        @endif
                        data: [
                            @foreach($model->datasets[$i]['values'] as $dta)
                                {{ $dta }},
                            @endforeach
                        ]
                    },
                @endfor
            ]
        })
    });
</script>

@if(!$model->customId)
    @include('charts::_partials.container.div')
@endif
