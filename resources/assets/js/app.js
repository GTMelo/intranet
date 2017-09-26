
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('message', require('./components/Message.vue'));

Vue.component('input-text', require('./components/Input-text.vue'));
Vue.component('input-password', require('./components/Input-password.vue'));
Vue.component('documento-card', require('./components/Documento-card.vue'));
Vue.component('escolaridade-item', require('./components/Escolaridade-item.vue'));
Vue.component('i-table', require('./components/I-table.vue'));
Vue.component('i-item', require('./components/I-item.vue'));


const app = new Vue({
    el: '#app',

    data: {

        testArray: ['thing', 'thang'],

        showTestModal: false,
        showLoginModal: false,
        showRegistrationModal: false
    },

    methods: {

    },

    computed: {

    }
});
