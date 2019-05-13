
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import routes from './routes';
import App from './App.vue';
import { store } from './stores/store';

window.Vue = require('vue');

Vue.use(VueRouter);
const router = new VueRouter({
  mode: 'history',
  routes
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue(Vue.util.extend({ router, store }, App)).$mount('#app');
