<template>
    <div>
        <transition-group
                name="list"
                tag="div"
                class="row"
                v-bind:css="false"
                v-on:before-enter="beforeEnter"
                v-on:enter="enter"
                v-on:after-enter="afterEnter">
            <div class="col-md-12 grid-margin stretch-card"
                 v-for="(task, index) in tasks"
                 :key="task.id"
                 :data-delay="setDelay(index, prePage)">
                <user-task-card :task="task"></user-task-card>
            </div>
        </transition-group>
        <scroll-loader :loader-method="loadMoreData" :loader-enable="loaderEnable" loader-color="#09b4f7"></scroll-loader>
    </div>
</template>

<script>
    import UserTaskCard from "../../basic/cards/UserTaskCard";
    import Router from "../../basic/system/Router";
    import ErrorHandler from "../../basic/system/ErrorHandler";
    import ListAnimation from "../../basic/animations/ListAnimation";
    export default {
        name: "TaskList",
        mixins: [Router, ErrorHandler, ListAnimation],
        components: {UserTaskCard},
        data: function () {
            return {
                tasks: [],
                nextTasks: null,
                prePage: null,
                loaderEnable: false
            }
        },
        created: function () {
            this.loadData();
        },
        updated: function () {
            this.$root.hideLoader();
        },
        mounted: function () {
            this.$on('animation', this.afterAnimation)
        },
        methods: {
            loadData: function () {
                axios.get(this.route.tasks)
                    .then(response => {
                        this.tasks = response.data.data;
                        this.nextTasks = response.data.links.next;
                        this.prePage = response.data.meta.per_page;
                        this.loaderEnable = this.canLoadMore
                    })
                    .catch(error => {
                        this.handleErrorStatusCodes(error);
                    });
            },
            loadMoreData: function () {
                if (this.canLoadMore) {
                    this.showSyncIndicator();
                    this.loaderEnable = false;
                    axios.get(this.nextTasks)
                        .then(response => {
                            this.tasks = this.tasks.concat(response.data.data);
                            this.nextTasks = response.data.links.next;
                            this.loaderEnable = this.canLoadMore
                        })
                        .catch(error => {
                            this.handleErrorStatusCodes(error);
                        });
                }
            },
            afterAnimation: function () {
                this.hideIndicator();
            }
        },
        computed: {
            canLoadMore: function () {
                return this.nextTasks !== null;
            }
        }
    }
</script>