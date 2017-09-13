<template>

    <article :class="this.typeOfMessage">
        <div class="message-header">
            <p>{{title}}</p>
            <button class="delete" aria-label="delete"></button>
        </div>
        <div class="message-body">
            <slot></slot>
        </div>
    </article>

</template>

<script>

    export default{
        props: ['cat', 'title'],

        computed: {
            typeOfMessage(){
                let result = "message";

                switch (this.cat){
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
        }
    }

</script>