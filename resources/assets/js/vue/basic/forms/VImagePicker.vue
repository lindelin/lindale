<template>
    <div>
        <label>{{ label }}</label>
        <croppa v-model="cropper"
                :prevent-white-space="true"
                :reverse-scroll-to-zoom="true"
                :placeholder="trans.get('common.choose-file')"></croppa>
        <div class="invalid-feedback" v-for="error in errors">
            {{ error }}
        </div>
    </div>
</template>

<script>
    import Croppa from 'vue-croppa'
    export default {
        name: "VImagePicker",
        components: {
            croppa: Croppa.component
        },
        props: {
            label: {
                require  : true,
                default: null
            },
            value: {
                require  : false,
                default: null
            },
            errors: {
                type: Array,
                require  : false,
                default: () => ([])
            }
        },
        data: function () {
            return {
                cropper: {}
            }
        }
    }
</script>