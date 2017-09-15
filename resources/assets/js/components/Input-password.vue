<template>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">{{ label }}</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control is-expanded">
                    <input class="input" type="password" :name="name" placeholder="digite a senha">
                    <p class="help">{{ help }}</p>
                </div>
            </div>
            <div class="field" v-if="hasConfirm">
                <div class="control is-expanded">
                    <input class="input" type="password" :name="nameConfirm" placeholder="confirme a senha">
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
            confirm: {
                type: String,
                default: ""
            },
        },

        computed: {
            nameConfirm(){
                return this.name + "_confirmation"
            },
            hasConfirm(){
                return !!this.confirm;

            }
        }
    }

</script>