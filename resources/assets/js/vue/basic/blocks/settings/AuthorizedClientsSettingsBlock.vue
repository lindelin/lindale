<template>
    <div>
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon text-white mr-2">
                    <i class="menu-icon mdi mdi-apps"></i>
                </span>
                {{ trans.get('config.authorized-clients') }}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/settings">{{ trans.get('header.settings') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans.get('config.authorized-clients') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AuthorizedClientsSettingsBlock"
    }
</script>