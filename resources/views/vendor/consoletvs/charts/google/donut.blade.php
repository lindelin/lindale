<script type="text/javascript">
    google.charts.setOnLoadCallback(draw{{ $model->id }})

    function draw{{ $model->id }}() {
        var data = google.visualization.arrayToDataTable([
            ['Element', 'Value'],
            @for ($l = 0; $l < count($model->values); $l++)
                ["{{ $model->labels[$i] }}", {{ $model->values[$i] }}],
            @endfor
        ])

        var options = {
            @include('charts::_partials.dimension.js')
            fontSize: 12,
            pieHole: 0.4,
            @if($model->title)
                title: "{!! $model->title !!}",
            @endif
            @if($model->colors)
                colors:[
                    @foreach($model->colors as $color)
                        "{{ $color}}",
                    @endforeach
                ],
            @endif
        };

        var {{ $model->id }} = new google.visualization.PieChart(document.getElementById("{{ $model->id }}"))
        {{ $model->id }}.draw(data, options)
    }
</script>

@if(!$model->customId)
    @include('charts::_partials.container.div')
@endif
