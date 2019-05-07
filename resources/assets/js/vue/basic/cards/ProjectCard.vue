<template>
    <div class="card card-statistics" @click="showDetail(url)">
        <img :src="img ? img : '/images/no-image.svg'" class="card-img-top" :alt="name">
        <div class="card-body">
            <div class="clearfix">
                <p class="mb-1">{{ type }}<span class="badge badge-danger ml-1">{{ status }}</span></p>
                <div class="fluid-container">
                    <h4 class="font-weight-medium mb-0">{{ name }}</h4>
                </div>
            </div>
            <div class="wrapper mt-3">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Completed</p>
                    <p class="mb-2" :class="progressStatusTextColor">{{ progress }}%</p>
                </div>
                <progress-bar :progress="progress" :color="progressStatusColor"></progress-bar>
            </div>
            <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-reload mr-1" aria-hidden="true"></i>更新日時：{{ updatedAt }}
            </p>
        </div>
    </div>
</template>

<script>
    import ProgressBar from "../common/ProgressBar";
    export default {
        name: "ProjectCard",
        components: {ProgressBar},
        props: ['url', 'img', 'name', 'type', 'status', 'progress', 'updatedAt'],
        methods: {
            showDetail: function (url) {
                window.open(url, '_blank');
            }
        },
        computed: {
            progressStatusColor: function () {
                if (this.progress < 20) {
                    return 'bg-danger'
                }

                if (this.progress < 40) {
                    return 'bg-warning'
                }

                if (this.progress < 60) {
                    return 'bg-info'
                }

                if (this.progress < 80) {
                    return 'bg-primary'
                }

                return 'bg-primary'
            },
            progressStatusTextColor: function () {
                if (this.progress < 20) {
                    return 'text-danger'
                }

                if (this.progress < 40) {
                    return 'text-warning'
                }

                if (this.progress < 60) {
                    return 'text-info'
                }

                if (this.progress < 80) {
                    return 'text-primary'
                }

                return 'text-primary'
            }
        }
    }
</script>