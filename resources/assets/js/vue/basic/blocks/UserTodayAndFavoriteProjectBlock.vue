<template>
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
           <user-today-card></user-today-card>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <favorite-project-card :projects="favoriteProjects"></favorite-project-card>
        </div>
    </div>
</template>

<script>
    import UserTodayCard from "../cards/UserTodayCard";
    import FavoriteProjectCard from "../cards/FavoriteProjectCard";
    export default {
        name: "UserTodayAndFavoriteProjectBlock",
        components: {FavoriteProjectCard, UserTodayCard},
        props: ['favoriteProjects']
    }
</script>