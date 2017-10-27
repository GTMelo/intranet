<template>
    <div class="field">
        <label class="label">{{ label }}</label>
        <div class="control">
            <input class="input" type="text" :name="name">
            <p class="help">{{ help }}</p>
        </div>
    </div>
</template>

<script>

    export default{
        props: {
            label: {
                type: String,
                default: ""
            },
            name: {
                type: String,
                default: ""
            },
            help: {
                type: String,
                default: ""
            },
        }
    }

</script>