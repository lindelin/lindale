<script>
    import { Area } from 'vue-chartjs'
    export default {
        extends: Area,
        props: ['chartdata', 'options'],
        mounted () {
            this.renderChart(this.chartdata, this.options)
        }
    }
</script>