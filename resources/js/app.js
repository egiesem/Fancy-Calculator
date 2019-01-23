
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import swal from 'sweetalert'


Vue.use(VueRouter)
window.Vue = require('vue');
window.swal = swal;


import Calc from './components/ExampleComponent.vue';
import CalcEdit from './components/ExampleComponentEdit.vue';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const routes = [

    { path: '/', component: Calc },
    { path: '/:id/edit', component: CalcEdit, name:'editformula' },

    // { path: '*',  component: Notfound },
    

    
  ]


const router = new VueRouter({
// mode: 'history',

routes, // short for `routes: routes`
linkActiveClass: 'active'
})

    
const app = new Vue({
    router
    }).$mount('#app')
    

// const app = new Vue({
//     el: '#app'
// });
