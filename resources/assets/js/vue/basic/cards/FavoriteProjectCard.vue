<template>
    <div class="card">
        <div class="card-body" v-if="projects.length > 0">
            <h2 class="card-title text-primary mb-5">{{ trans.get('project.favorite') }}</h2>
            <div class="wrapper" v-for="project in projects">
                <div class="d-flex justify-content-between">
                    <a :href="'/projects/' + project.id"><h4 class="mb-2" :class="progressStatusTextColor(project.progress)">{{ project.title }}</h4></a>
                    <p class="mb-2" :class="progressStatusTextColor(project.progress)">{{ project.progress }}%</p>
                </div>
                <progress-bar :progress="project.progress" :color="progressStatusColor(project.progress)"></progress-bar>
            </div>
        </div>
        <div class="card-body" v-else>
            <h2 class="card-title text-dark mb-5">{{ trans.get('project.favorite') }}</h2>
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
        },
        computed: {
            progressStatusColor: function () {
               return function (progress) {
                   if (progress < 20) {
                       return 'bg-danger'
                   }

                   if (progress < 40) {
                       return 'bg-warning'
                   }

                   if (progress < 60) {
                       return 'bg-info'
                   }

                   if (progress < 80) {
                       return 'bg-primary'
                   }

                   return 'bg-primary'
               }
            },
            progressStatusTextColor: function () {
                return function (progress) {
                    if (progress < 20) {
                        return 'text-danger'
                    }

                    if (progress < 40) {
                        return 'text-warning'
                    }

                    if (progress < 60) {
                        return 'text-info'
                    }

                    if (progress < 80) {
                        return 'text-primary'
                    }

                    return 'text-primary'
                }

            }
        }
    }
</script>