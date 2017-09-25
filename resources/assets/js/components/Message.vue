<template>

    <transition leaveActiveClass="animated zoomOutDown">
        <article :class="this.typeOfMessage" v-show="isVisible">
            <div class="message-header">
                <p>{{title}}</p>
                <button class="delete" aria-label="delete" v-on:click="hide"></button>
            </div>
            <div class="message-body">
                <slot></slot>
            </div>
        </article>
    </transition>

</template>

<script>

    export default{
        props: ['cat', 'title'],

        data() {
            return {
                isVisible: true
            }
        },

        methods: {
            hide(){
                this.isVisible = false;
            }
        },

        computed: {
            typeOfMessage(){
                let result = "message notification";

                switch (this.cat) {
                    case('danger'):
                        result += ' is-danger';
                        break;
                    case ('warning'):
                        result += ' is-warning';
                        break;
                    case ('success'):
                        result += ' is-success';
                        break;
                    default:
                }

                return result;
            }
        },
    }

</script>