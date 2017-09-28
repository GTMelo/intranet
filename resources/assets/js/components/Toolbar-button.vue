<template>
    <div class="toolbar-button">
        <a :href="url">
            <div class="toolbar-button-content">
                <i :class="classes" aria-hidden="true"></i>
                <span><slot></slot></span>
            </div>
        </a>
    </div>

</template>

<script>
    export default {
        props: ['icon', 'url'],

        computed: {
            classes() {
                return "fa " + this.icon;
            },
        }
    }
</script>