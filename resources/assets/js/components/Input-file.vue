<template>
    <div>
        <modal id="modal1" name="modal1" text="clickety">
            <p slot="header">Fazer o upload de um arquivo</p>
            <button slot="footer" class="button">Fechar</button>

            <div class="img-upload-zone"></div>
        </modal>
    </div>
    
</template>

<script>
    export default {
        name: "input-file",
        props: ['id', 'name'],
    }
</script>

<style scoped>

</style>