<template>
    <div>
        <user-status-block></user-status-block>
        <user-activity-block></user-activity-block>
    </div>
</template>

<script>
    import UserStatusBlock from "../../basic/blocks/UserStatusBlock";
    import UserActivityChart from "../../basic/charts/UserActivityChart";
    import UserActivityBlock from "../../basic/blocks/UserActivityBlock";
    export default {
        name: "HomeDashboard",
        components: {UserActivityBlock, UserActivityChart, UserStatusBlock}
    }
</script>