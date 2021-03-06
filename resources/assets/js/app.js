import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'

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
Vue.use(Vuex)



import App from './App'
import Home from './components/Home'
import Login from './components/Login'
import Admin from './components/Admin'
import Register from './components/Register'
import Welcome from './components/Welcome'
import GoogleMape from './components/GoogleMape'


import StoreData from './store'



const store = new Vuex.Store(StoreData );


Vue.component('example-component', require('./components/ExampleComponent.vue'));

function beforeEnter(to, from, next) {
    if (getToken()) {
        next();
    } else {
        next('/login')
    }
}

function getToken() {
    return localStorage.getItem('token');
}

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'welcome',
            component: Welcome

        },
        {
            path: '/home',
            name: 'home',
            component: Home,
            beforeEnter
        },
        {
            path: '/login',
            name: 'login',
            component: Login

        },
        {
            path: '/register',
            name: 'register',
            component: Register
        },
        {
            path: '/admin',
            name: 'admin',
            component: Admin,
            // beforeEnter
        }

    ],
});

const app = new Vue({
    el: '#dev',
    components: { App },
    router,
    store
});