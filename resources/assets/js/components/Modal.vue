<template>
    <transition leaveActiveClass="animated fadeOut">
        <div class="modal is-active">
            <div class="modal-background animated fadeIn" @click="$emit('close')"></div>
            <div class="modal-content animated fadeInUp">
                <div class="modal-card">
                    <div class="modal-card-head">
                        <h1 class="is-size-4"><strong>{{ title }}</strong></h1>
                    </div>
                    <div class="modal-card-body">
                        <slot></slot>
                    </div>
                    <div v-if="this.hasFooter" class="modal-card-foot">
                        <slot name="footer"></slot>
                    </div>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close" @click="$emit('close')"></button>
        </div>
    </transition>
</template>

<script>
    export default{

        props: ['title'],

        computed: {
            hasFooter(){
                return this.$slots.footer;
            }
        },

        mounted(){
        }

    }
</script>