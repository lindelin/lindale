<template>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-primary mb-5">{{ trans.get('project.favorite') }}</h2>
            <div class="wrapper">
                <div class="d-flex justify-content-between">
                    <h4 class="mb-2">Sales</h4>
                    <p class="mb-2 text-primary">88%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 88%" aria-valuenow="88"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="wrapper mt-4">
                <div class="d-flex justify-content-between">
                    <h4 class="mb-2">Sales</h4>
                    <p class="mb-2 text-primary">88%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 88%" aria-valuenow="88"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="wrapper mt-4">
                <div class="d-flex justify-content-between">
                    <h4 class="mb-2">Sales</h4>
                    <p class="mb-2 text-primary">88%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 88%" aria-valuenow="88"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FavoriteProjectCard"
    }
</script>