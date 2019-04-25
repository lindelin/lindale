<template>
    <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
                <div class="float-left" v-html="icon"></div>
                <div class="float-right">
                    <p class="mb-0 text-right">{{ title }}</p>
                    <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{ status }}</h3>
                    </div>
                </div>
            </div>
            <p class="text-muted mt-3 mb-0">
                <slot></slot>
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "StatusCard",
        props: ['icon', 'title', 'status']
    }
</script>