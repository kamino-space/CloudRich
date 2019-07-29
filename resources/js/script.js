require('./bootstrap');

window.Vue = require('vue');

import Index from './components/IndexComponent.vue';

const app = new Vue({
    el: '#app',
    render: h => h(Index)
});