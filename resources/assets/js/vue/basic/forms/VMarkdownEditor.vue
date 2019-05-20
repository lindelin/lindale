<template>
    <div>
        <label :for="id">{{ label }}</label>
        <markdown-editor v-bind:value="value"
                         v-on:input="$emit('input', $event)">
                         :id="id"
                         ref="markdownEditor"></markdown-editor>
        <div class="invalid-feedback" v-for="error in errors">
            {{ error }}
        </div>
    </div>
</template>

<script>
    import markdownEditor from 'vue-simplemde/src/markdown-editor'
    export default {
        name: "VMarkdownEditor",
        components: {
            markdownEditor
        },
        props: {
            id: {
                type: String,
                require  : false,
                default: null
            },
            label: {
                require  : true,
                default: null
            },
            value: {
                require: false,
                default: null
            },
            errors: {
                type: Array,
                require  : false,
                default: () => ([])
            }
        }
    }
</script>

<style scoped>
    @import '~simplemde/dist/simplemde.min.css';
</style>