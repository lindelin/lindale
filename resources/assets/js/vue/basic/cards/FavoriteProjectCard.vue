<template>
    <div class="card">
        <div class="card-body" v-if="projects.length > 0" v-for="project in projects">
            <h2 class="card-title text-primary mb-5">{{ trans.get('project.favorite') }}</h2>
            <div class="wrapper">
                <div class="d-flex justify-content-between">
                    <a href="#"><h4 class="mb-2">{{ project.title }}</h4></a>
                    <p class="mb-2 text-primary">{{ project.progress }}%</p>
                </div>
                <progress-bar :progress="project.progress" color="bg-info"></progress-bar>
            </div>
        </div>
        <div class="card-body" v-if="projects.length === 0">
            <h2 class="card-title text-primary mb-5">{{ trans.get('project.favorite') }}</h2>
            <p class="card-description">{{ trans.get('project.none-favorite') }}</p>
        </div>
    </div>
</template>

<script>
    import ProgressBar from "../common/ProgressBar";
    export default {
        name: "FavoriteProjectCard",
        components: {ProgressBar},
        props: {
            projects: {
                type: Array,
                require  : false,
                default: []
            }
        }
    }
</script>