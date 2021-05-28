require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './views/Home.vue';
import Certificate from './views/certificates.vue';

window.Vue = require('vue');
Vue.use(VueRouter);
axios.defaults.withCredentials = true

Vue.component('certificate', require('./views/certificates.vue').default);


const routes = [
    {
        path: "/",
        name: 'home',
        component: Home
    },
  
]

const router = new VueRouter({
    // mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    router
});
