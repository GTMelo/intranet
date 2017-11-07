<template>
    <div>
        <button :class="classes" :id="id" @click="this.show">{{ text }}</button>

        <div class="modal is-active" v-if="visible">
            <div class="modal-background animated fadeIn" ></div>
            <div class="modal-card animated bounceIn">
                <header class="modal-card-head">
                    <p class="modal-card-title">
                        <slot name="card_header"></slot>
                    </p>
                    <button class="delete" aria-label="close" @click="hide"></button>
                </header>

                <section class="modal-card-body">
                    <slot></slot>
                </section>

                <div class="modal-card-foot">
                    <slot name="card-footer"></slot>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "modal2",
        props: [
            'classes',
            'id',
            'text',

        ],
        data() {
            return {
                visible: false,
            }
        },
        methods: {
            show: function () {
                this.visible = true;
            },
            hide: function () {
                this.visible = false;
            }
        }
    }
</script>

<style scoped>

</style>