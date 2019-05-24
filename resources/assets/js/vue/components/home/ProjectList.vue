<template>
    <div>
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
                <div class="col-12">
                    <projects-block :projects="managedProjects"
                                    :pre-page="managedProjectPrePage"
                                    @animation="afterAnimation"></projects-block>
                </div>
            </div>
            <div class="row" v-else :key="isMainTab">
                <div class="col-12">
                    <projects-block :projects="joinedProjects"
                                    :pre-page="joinedProjectPrePage"
                                    @animation="afterAnimation"></projects-block>
                </div>
            </div>
        </transition>
        <scroll-loader :loader-method="loadMoreData" :loader-enable="loaderEnable" loader-color="#09b4f7"></scroll-loader>
    </div>
</template>

<script>
    import Router from "../../basic/system/Router";
    import ErrorHandler from "../../basic/system/ErrorHandler";
    import ProjectsBlock from "../../basic/blocks/ProjectsBlock";
    export default {
        name: "ProjectList",
        mixins: [Router, ErrorHandler],
        components: {ProjectsBlock},
        data: function () {
            return {
                managedProjects: [],
                joinedProjects: [],
                nextManagedProjects: null,
                nextJoinedProjects: null,
                managedProjectPrePage: null,
                joinedProjectPrePage: null,
                isMainTab: true,
                loaderEnable: false
            }
        },
        created: function () {
            this.loadData();
            this.loadJoinedProjects();
        },
        updated: function () {
            this.$root.hideLoader();
        },
        methods: {
            loadData: function () {
                axios.get(this.route.projects.managed)
                    .then(response => {
                        this.managedProjects = response.data.data;
                        this.nextManagedProjects = response.data.links.next;
                        this.managedProjectPrePage = response.data.meta.per_page;
                        this.loaderEnable = this.loadMore;
                    })
                    .catch(error => {
                        this.handleErrorStatusCodes(error);
                    });
            },
            loadJoinedProjects: function () {
                axios.get(this.route.projects.managed)
                    .then(response => {
                        this.joinedProjects = response.data.data;
                        this.nextJoinedProjects = response.data.links.next;
                        this.joinedProjectPrePage = response.data.meta.per_page;
                        this.loaderEnable = this.loadMore;
                    })
                    .catch(error => {
                        this.handleErrorStatusCodes(error);
                    });
            },
            loadMoreData: function () {
                if (this.loadMore) {
                    this.showSyncIndicator();
                    this.loaderEnable = false;
                    let url = this.isMainTab ? this.nextManagedProjects : this.nextJoinedProjects
                    axios.get(url)
                        .then(response => {
                            if (this.isMainTab) {
                                this.managedProjects = this.managedProjects.concat(response.data.data);
                                this.nextManagedProjects = response.data.links.next;
                            } else {
                                this.joinedProjects = this.joinedProjects.concat(response.data.data);
                                this.nextJoinedProjects = response.data.links.next;
                            }
                            this.loaderEnable = this.loadMore;
                        })
                        .catch(error => {
                            this.handleErrorStatusCodes(error);
                        });
                }
            },
            tabChange: function (tab) {
                this.isMainTab = tab;
                this.loaderEnable = this.loadMore;
            },
            afterAnimation: function () {
                this.hideIndicator();
            }
        },
        computed: {
            projectListChangeAnimationName: function () {
                return this.isMainTab ? 'slide-fade-left' : 'slide-fade-right'
            },
            loadMore: function () {
                if (this.isMainTab) {
                    return this.nextManagedProjects !== null;
                } else {
                    return this.nextJoinedProjects !== null;
                }
            }
        }
    }
</script>