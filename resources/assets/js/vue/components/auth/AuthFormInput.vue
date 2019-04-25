<template>
    <div class="form-group">
        <label :for="name" class="label">{{ displayName }}</label>
        <div class="input-group">
            <input :id="name"
                   :type="type"
                   :name="name"
                   :value="value"
                   :class="{'form-control': true, 'is-invalid': isInvalid}"
                   :placeholder="displayName">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['name', 'displayName', 'isInvalid', 'value', 'type']
    }
</script>