<template>
    <transition-group
            name="list"
            tag="div"
            class="row"
            v-bind:css="false"
            v-on:before-enter="beforeEnter"
            v-on:enter="enter"
            v-on:after-enter="afterEnter">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card" :key="'create'">
            <create-project-block></create-project-block>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card"
             v-for="(project, index) in projects"
             :key="project.id"
             :data-last="index === (projects.length - 1)"
             :data-delay="setDelay(index, prePage)">
            <project-card :url="project.url"
                          :img="project.image"
                          :name="project.title"
                          :type="project.type"
                          :status="project.status"
                          :progress="project.progress"
                          :updated-at="project.updated_at"></project-card>
        </div>
    </transition-group>
</template>

<script>
    import CreateProjectBlock from "./CreateProjectBlock";
    import ProjectCard from "../cards/ProjectCard";
    import ListAnimation from "../animations/ListAnimation";
    export default {
        name: "ProjectsBlock",
        mixins: [ListAnimation],
        components: {ProjectCard, CreateProjectBlock},
        props: {
            projects: {
                type: Array,
                require: false,
                default: () => ([])
            },
            prePage: {
                type: Number,
                require: false,
                default: 1
            }
        }
    }
</script>