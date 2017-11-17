<template>
    <div>
        <flat-pickr
                v-model="date"
                :input-class="classes"
                :placeholder="placeholder"
                :name="name"
                :config="config"
                :required="required"
                :id="id"
        ></flat-pickr>
    </div>
</template>

<script>
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';
    import {Portuguese} from 'flatpickr/dist/l10n/pt';

    export default {
        props: ['required', 'id', 'name', 'classes', 'min', 'max'],
        data () {
            let today = new Date().toISOString();

            return {
                date: today,
                placeholder: "Selecione uma data",
                config: {
                    allowInput: true,
                    dateFormat: "d/m/Y",
                    locale: Portuguese,
                    minDate: this.min,
                    maxDate: this.max,
                },
            }
        },
        components: {
            flatPickr
        },
        computed: {
        }
    }
</script>

<style scoped>

</style>