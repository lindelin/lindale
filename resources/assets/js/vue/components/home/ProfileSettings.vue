<template>
    <div>
        <transition name="fade" mode="out-in">
            <profile-settings-block v-if="active === 'profile-settings'"></profile-settings-block>
            <account-settings-block v-if="active === 'account-settings'"></account-settings-block>
            <location-settings-block v-if="active === 'location-settings'"></location-settings-block>
            <notification-settings-block v-if="active === 'notification-settings'"></notification-settings-block>
            <authorized-clients-settings-block v-if="active === 'authorized-clients-settings'"></authorized-clients-settings-block>
            <oauth-app-settings-block v-if="active === 'oauth-app-settings'"></oauth-app-settings-block>
            <oauth-personal-settings-block v-if="active === 'oauth-personal-settings'"></oauth-personal-settings-block>
        </transition>
    </div>
</template>

<script>
    import ProfileSettingsBlock from "../../basic/blocks/settings/ProfileSettingsBlock";
    import AccountSettingsBlock from "../../basic/blocks/settings/AccountSettingsBlock";
    import LocationSettingsBlock from "../../basic/blocks/settings/LocationSettingsBlock";
    import NotificationSettingsBlock from "../../basic/blocks/settings/NotificationSettingsBlock";
    import AuthorizedClientsSettingsBlock from "../../basic/blocks/settings/AuthorizedClientsSettingsBlock";
    import OauthAppSettingsBlock from "../../basic/blocks/settings/OauthAppSettingsBlock";
    import OauthPersonalSettingsBlock from "../../basic/blocks/settings/OauthPersonalSettingsBlock";
    export default {
        name: "ProfileSettings",
        components: {
            OauthPersonalSettingsBlock,
            OauthAppSettingsBlock,
            AuthorizedClientsSettingsBlock,
            NotificationSettingsBlock, LocationSettingsBlock, AccountSettingsBlock, ProfileSettingsBlock},
        created: function () {
            this.$root.hideLoader();
            this.$root.sidebarActive = 'profile-settings';
        },
        computed: {
            active: function () {
                return this.$root.sidebarActive;
            }
        }
    }
</script>