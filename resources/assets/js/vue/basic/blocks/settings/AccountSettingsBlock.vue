<template>
    <div>
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon text-white mr-2">
                    <i class="menu-icon mdi mdi-lock"></i>
                </span>
                {{ trans.get('user.account') }}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/settings">{{ trans.get('header.settings') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans.get('user.account') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AccountSettingsBlock"
    }
</script>