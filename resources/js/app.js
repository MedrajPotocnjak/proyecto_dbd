/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader
import 'material-design-icons-iconfont/dist/material-design-icons.css'

Vue.use(Vuetify)
Vue.use(VueRouter)



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

const Example=Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const Features=Vue.component('alumno-sidebar-component', require('./components/AlumnoSidebar.vue').default);
const Horario=Vue.component('alumno-horario-component', require('./components/AlumnoHorario.vue').default);

const barraProfe=Vue.component('profesor-sidebar-component', require('./components/ProfesorSidebar.vue').default);
const barraCoord=Vue.component('coordinador-sidebar-component', require('./components/CoordinadorSidebar.vue').default);
const barraAdmin=Vue.component('administrador-sidebar-component', require('./components/AdministradorSidebar.vue').default);

const routes = [

  { path: '/', component: Example },

  { path: '/horario', component: Horario }

]

  

const router = new VueRouter({
  routes 
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router
}).$mount('#app');
