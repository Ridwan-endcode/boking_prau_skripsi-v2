require('./bootstrap');

import Vue from 'vue';

Vue.component('message-component',require('./components/MessageComponent.vue').default);
Vue.component('message-component-count',require('./components/MessageComponentCount.vue').default);

const app = new Vue({
    el: '#app',
});