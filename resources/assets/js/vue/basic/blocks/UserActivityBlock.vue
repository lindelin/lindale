<template>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row d-none d-sm-flex mb-4">
                        <div class="col-4">
                            <h5 class="text-primary">Unique Visitors</h5>
                            <p>34657</p>
                        </div>
                        <div class="col-4">
                            <h5 class="text-primary">Bounce Rate</h5>
                            <p>45673</p>
                        </div>
                        <div class="col-4">
                            <h5 class="text-primary">Active session</h5>
                            <p>45673</p>
                        </div>
                    </div>
                    <div class="chart-container">
                        <user-activity-chart :datasets="datasets" :height="240"></user-activity-chart>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UserActivityChart from "../charts/UserActivityChart";
    export default {
        name: "UserActivityBlock",
        components: {UserActivityChart},
        data: function () {
            return {
                datasets: {
                    task: [0, 11, 6, 10, 8, 0]
                }
            }
        }
    }
</script>

<style scoped>

</style>