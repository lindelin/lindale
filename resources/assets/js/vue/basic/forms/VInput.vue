<template>
    <div>
        <label :for="id">{{ label }}</label>
        <input :type="type"
               class="form-control"
               :class="{'is-invalid': errors.length > 0}"
               :id="id"
               :placeholder="label"
               v-bind:value="value"
               v-on:input="$emit('input', $event.target.value)">
        <div class="invalid-feedback" v-for="error in errors">
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
            label: {
                require  : true,
                default: null
            },
            value: {
                require  : true,
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

</style>