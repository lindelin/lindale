<template>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated"
             :class="[color]"
             role="progressbar"
             :style="{width: progress + '%'}"
             :aria-valuenow="progress"
             aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>
</template>

<script>
    export default {
        name: "ProgressBar",
        props: ['progress', 'color']
    }
</script>