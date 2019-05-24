<template>
    <div>
        <label :for="id">{{ label }}</label>
        <vue-date-picker :range="false"
                         v-bind:value="value"
                         v-on:input="$emit('input', $event)"
                         :id="id"
                         :lang="trans.getLocale()"
                         position="top"
                         firstDayOfWeek="sunday"></vue-date-picker>
        <div class="invalid-feedback" v-for="error in errors" style="display: block">
            {{ error }}
        </div>
    </div>
</template>

<script>
    import VueDatePicker from 'vue-datepicker-ui'
    export default {
        name: "VDatepicker",
        components: {VueDatePicker},
        props: {
            id: {
                type: String,
                require: false,
                default: null
            },
            label: {
                require: true,
                default: null
            },
            value: {
                require: false,
                default: () => (new Date())
            },
            errors: {
                type: Array,
                require: false,
                default: () => ([])
            }
        }
    }
</script>