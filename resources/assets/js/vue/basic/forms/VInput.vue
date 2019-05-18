<template>
    <div>
        <label :for="id">{{ label }}</label>
        <input :type="type"
               class="form-control"
               :class="{'is-invalid': isInvalid}"
               :id="id"
               :placeholder="label">
        <div class="invalid-feedback" v-if="isInvalid" v-for="error in errors">
            {{ error }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "VInput",
        props: {
            id: {
                type: String,
                require  : false,
                default: null
            },
            type: {
                type: String,
                require: false,
                default: 'text'
            },
            isInvalid: {
                type: Boolean,
                require  : false,
                default: false
            },
            label: {
                require  : true,
                default: null
            },
            errors: {
                type: Array,
                require  : false,
                default: []
            }
        }
    }
</script>

<style scoped>

</style>