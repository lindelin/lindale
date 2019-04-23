<template>
    <div class="form-check form-check-flat mt-0">
        <label class="form-check-label">
            <input type="checkbox" :name="name" :value="value ? value : true"> {{ displayName }}
        </label>
    </div>
</template>

<script>
    export default {
        props: ['name', 'displayName', 'value'],
        mounted() {
            $(".form-check label").append('<i class="input-helper"></i>');
        }
    }
</script>