<template>

    <div class="field ">
        <div class="field-label is-normal">
            <label class="label">{{ label }}</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" :name="name">
                    <p class="help">{{ help }}</p>
                </div>
            </div>
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