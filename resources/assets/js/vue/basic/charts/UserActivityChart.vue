<script>
    import { Line } from 'vue-chartjs'
    export default {
        extends: Line,
        props: ['datasets'],
        data: function () {
            return {
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        yAxes: [{
                            display: false
                        }]
                    },
                    elements: {
                        point: {
                            radius: 3
                        }
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        }
                    },
                    stepsize: 1
                }
            }
        },
        mounted() {
            this.renderLineChart();
        },
        methods: {
            renderLineChart: function() {
                this.renderChart({
                    labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
                    datasets: [
                        {
                            label: 'Tasks',
                            data: this.sets.task,
                            backgroundColor: 'rgba(0, 128, 207, 0.4)',
                            borderWidth: 1,
                            fill: true
                        },
                        {
                            label: 'TODOs',
                            data: [0, 7, 11, 8, 11, 0],
                            backgroundColor: 'rgba(2, 178, 248, 0.4)',
                            borderWidth: 1,
                            fill: true
                        },
                        {
                            label: 'Support',
                            data: [0, 14, 10, 14, 6, 0],
                            backgroundColor: 'rgba(73, 221, 255, 0.4)',
                            borderWidth: 1,
                            fill: true
                        },
                        {
                            label: 'Support',
                            data: [0, 14, 10, 14, 6, 0],
                            backgroundColor: 'rgba(122,255,242,0.4)',
                            borderWidth: 1,
                            fill: true
                        }
                    ]
                }, this.options)
            }
        },
        computed: {
            sets: function() {
                return this.datasets;
            }
        },
        watch: {
            datasets: {
                handler: function () {
                    this.renderLineChart();
                },
                deep: true
            }
        }
    }
</script>