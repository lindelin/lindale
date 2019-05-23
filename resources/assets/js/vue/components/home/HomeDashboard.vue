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
    import Router from "../../basic/system/Router";
    import ErrorHandler from "../../basic/system/ErrorHandler";
    export default {
        name: "HomeDashboard",
        mixins: [Router, ErrorHandler],
        components: {UserTodayAndFavoriteProjectBlock, UserActivityBlock, UserStatusBlock},
        data: function () {
            return {
                profile: null
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
            }
        }
    }
</script>