import Vue from 'vue'
import VueRouter from 'vue-router'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter)

import App from './App'
import Home from './components/Home'
import Login from './components/Login'
import Register from './components/Register'
import Welcome from './components/Welcome'

Vue.component('example-component', require('./components/ExampleComponent.vue'));



const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'welcome',
            component: Welcome,
        },
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
        },
    ],
});

const app = new Vue({
    el: '#dev',
    components: { App },
    router,
});