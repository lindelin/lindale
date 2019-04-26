<template>
    <div>
        <user-status-block></user-status-block>
        <user-today-and-favorite-project-block></user-today-and-favorite-project-block>
        <user-activity-block></user-activity-block>
    </div>
</template>

<script>
    import UserStatusBlock from "../../basic/blocks/UserStatusBlock";
    import UserActivityChart from "../../basic/charts/UserActivityChart";
    import UserActivityBlock from "../../basic/blocks/UserActivityBlock";
    import UserTodayAndFavoriteProjectBlock from "../../basic/blocks/UserTodayAndFavoriteProjectBlock";
    export default {
        name: "HomeDashboard",
        components: {UserTodayAndFavoriteProjectBlock, UserActivityBlock, UserActivityChart, UserStatusBlock}
    }
</script>