<template>
    <div class="documento-card">
        <div class="documento-header">
            <h1>{{ tipo }}</h1>
        </div>
        <div class="documento-body">
            <div class="documento-image">
                <!--TODO on click, show expanded image (on a modal?)-->
                <a>
                    <img class="documento-card-thumbnail" :src="img">
                </a>
            </div>
            <div class="documento-content">
                <table>
                    <tr v-if="this.numero">
                        <td>Número:</td>
                        <td>{{ numero }}</td>
                    </tr>
                    <tr v-if="this.cpf">
                        <td>CPF:</td>
                        <td>{{ cpf }}</td>
                    </tr>
                    <tr v-if="this.expedidor">
                        <td>Órgão expedidor:</td>
                        <td>{{ expedidor }}</td>
                    </tr>
                    <tr v-if="this.zona">
                        <td>Zona:</td>
                        <td>{{ zona }}</td>
                    </tr>
                    <tr v-if="this.secao">
                        <td>Seção:</td>
                        <td>{{ secao }}</td>
                    </tr>
                    <tr v-if="this.serie">
                        <td>Série:</td>
                        <td>{{ serie }}</td>
                    </tr>
                    <tr v-if="this.emissao">
                        <td>Emissão:</td>
                        <td>{{ emissao }}</td>
                    </tr>
                    <tr v-if="this.validade">
                        <td>Validade:</td>
                        <td>{{ validade }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

    export default{
        props: ['tipo', 'img', 'numero', 'emissao', 'validade', 'cpf', 'expedidor', 'zona', 'secao', 'serie'],


    }

</script>