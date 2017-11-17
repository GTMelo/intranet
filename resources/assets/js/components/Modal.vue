<template>
    <div>
        <a :class="classes" :id="id" @click="this.show">{{ text }}</a>

        <transition leaveActiveClass="animated fadeOut">
        <div class="modal is-active" v-if="visible">
            <div class="modal-background animated fadeIn" @click="hide"></div>

            <!--Will show a modal card, unless freeform is true-->
            <div class="modal-card animated zoomIn" v-if="!isFreeform">
                <header class="modal-card-head">
                    <p class="modal-card-title">
                        <slot name="header"></slot>
                    </p>
                    <button class="delete" aria-label="close" @click="hide"></button>
                </header>

                <section class="modal-card-body">
                    <slot></slot>
                </section>

                <div class="modal-card-foot" v-if="hasFooter">
                    <slot name="footer"></slot>
                </div>
            </div>

            <!--If freeform is true, will not use a card. Slot will define what will be showed. Ex: image in a gallery-->
            <div v-if="isFreeform" class="modal-content animated zoomIn">
                <slot></slot>
                <button class="modal-close is-large" aria-label="close" @click="hide"></button>
            </div>
        </div>
            </transition>
    </div>

</template>

<script>
    export default {
        name: "modal",
        props: [
            'classes',
            'id',
            'text',
            'freeform'
        ],
        data() {
            return {
                visible: false,
            }
        },
        computed: {
            isFreeform: function () {
                return this.freeform === "true";
            },
            hasFooter: function () {
                return this.$slots.footer;
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