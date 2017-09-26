<template>

    <tr>
        <th>{{ label }}</th>
        <td><slot></slot></td>
    </tr>

</template>

<script>
    export default{
        props: ['label']
    }
</script>