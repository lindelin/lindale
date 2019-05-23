<template>
    <div v-if="profile">
        <div class="row">
            <div class="col-md-12 grid-margin" align="center">
                <div class="tab-button-group btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn" :class="{'btn-primary': isMainTab}" @click="tabChange(true)">
                        {{ trans.get('project.projects-manage') }}
                    </button>
                    <button type="button" class="btn" :class="{'btn-primary': !isMainTab}" @click="tabChange(false)">
                        {{ trans.get('project.projects-join') }}
                    </button>
                </div>
            </div>
        </div>
        <transition :name="projectListChangeAnimationName" mode="out-in">
            <div class="row" v-if="isMainTab" :key="isMainTab">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card">
                    <create-project-block></create-project-block>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card" v-for="project in profile.projects.management">
                    <project-card :url="'projects/' + project.id"
                                  :img="project.image"
                                  :name="project.title"
                                  :type="project.type"
                                  :status="project.status"
                                  :progress="project.progress"
                                  :updated-at="project.updated_at"></project-card>
                </div>
            </div>
            <div class="row" v-else :key="isMainTab">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card">
                    <create-project-block></create-project-block>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card" v-for="project in profile.projects.normal">
                    <project-card :url="'projects/' + project.id"
                                  :img="project.image"
                                  :name="project.title"
                                  :type="project.type"
                                  :status="project.status"
                                  :progress="project.progress"
                                  :updated-at="project.updated_at"></project-card>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    import ProjectCard from "../../basic/cards/ProjectCard";
    import CreateProjectBlock from "../../basic/blocks/CreateProjectBlock";
    import Router from "../../basic/system/Router";
    import ErrorHandler from "../../basic/system/ErrorHandler";
    export default {
        name: "ProjectList",
        mixins: [Router, ErrorHandler],
        components: {CreateProjectBlock, ProjectCard},
        data: function () {
            return {
                profile: null,
                isMainTab: true
            }
        },
        created: function () {
            this.loadData();
        },
        updated: function () {
            this.$root.hideLoader();
        },
        methods: {
            loadData: function () {
                axios.get(this.route.profile)
                    .then(response => {
                        this.profile = response.data;
                    })
                    .catch(error => {
                        this.handleErrorStatusCodes(error);
                    });
            },
            tabChange: function (tab) {
                this.isMainTab = tab
            }
        },
        computed: {
            projectListChangeAnimationName: function () {
                return this.isMainTab ? 'slide-fade-left' : 'slide-fade-right'
            }
        }
    }
</script>