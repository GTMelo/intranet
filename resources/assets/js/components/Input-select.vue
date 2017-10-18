<template>
    <select :name="name">
        {{ slot }}
    </select>
</template>

<script>
    export default {
        props: ['name']
    }
</script>