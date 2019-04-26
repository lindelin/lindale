<template>
    <div v-if="profile">
        <user-status-block :status="profile.status" :progress="profile.progress"></user-status-block>
        <user-today-and-favorite-project-block :favorite-projects="profile.projects.favorites"></user-today-and-favorite-project-block>
        <user-activity-block></user-activity-block>
    </div>
</template>

<script>
    import UserStatusBlock from "../../basic/blocks/UserStatusBlock";
    import UserActivityBlock from "../../basic/blocks/UserActivityBlock";
    import UserTodayAndFavoriteProjectBlock from "../../basic/blocks/UserTodayAndFavoriteProjectBlock";
    export default {
        name: "HomeDashboard",
        components: {UserTodayAndFavoriteProjectBlock, UserActivityBlock, UserStatusBlock},
        data: function () {
            return {
                profile: null
            }
        },
        created: function () {
            this.loadData();
        },
        methods: {
            loadData: function () {
                axios.get('/api/profile')
                    .then(response => {
                        console.log(response);
                        this.profile = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
</script>