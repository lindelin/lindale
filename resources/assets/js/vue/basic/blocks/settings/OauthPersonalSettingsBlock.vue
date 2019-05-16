<template>
    <div>
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon text-white mr-2">
                    <i class="menu-icon mdi mdi-key"></i>
                </span>
                {{ trans.get('config.oauth-personal') }}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/settings">{{ trans.get('header.settings') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans.get('config.oauth-personal') }}</li>
                </ol>
            </nav>
        </div>
        <personal-access-tokens></personal-access-tokens>
    </div>
</template>

<script>
    import PersonalAccessTokens from "../passport/PersonalAccessTokens";
    export default {
        name: "OauthPersonalSettingsBlock",
        components: {PersonalAccessTokens}
    }
</script>