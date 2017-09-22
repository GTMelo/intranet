<template>

    <div class="escolaridade-item">
        <div class="escolaridade-tipo">
            <p>{{ tipo }}</p>
        </div>
        <div class="escolaridade-detalhes">
            <table>
                <tr v-if="this.instituicao">
                    <td class="escolaridade-label">Instituição</td>
                    <td colspan="3">{{ instituicao }}</td>
                </tr>
                <tr v-if="this.curso">
                    <td class="escolaridade-label">Curso</td>
                    <td colspan="3">{{ curso }} </td>
                </tr>
                <tr v-if="this.situacao">
                    <td class="escolaridade-label">Situação</td>
                    <td colspan="3">{{ situacao }}</td>
                </tr>
                <tr>
                    <td class="escolaridade-label" v-if="this.inicio">Início</td>
                    <td v-if="this.inicio">{{ inicio }}</td>
                    <td class="escolaridade-label" v-if="this.termino">Término</td>
                    <td v-if="this.termino">{{ termino }}</td>
                </tr>
            </table>
        </div>
    </div>

</template>

<script>
    export default {
        props: [
            'tipo',
            'instituicao',
            'curso',
            'situacao',
            'inicio',
            'termino'
        ],
    }
</script>