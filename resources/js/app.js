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
const asignaturasCoord=Vue.component('asignatura-coordinador-sidebar-component', require('./components/AsignaturasCoordinador.vue').default);
const crearAlumnoCoord=Vue.component('coordinador-crear-alumno-sidebar-component', require('./components/CrearAlumno.vue').default);
const crearProfCoord=Vue.component('coordinador-crear-prof-sidebar-component', require('./components/CrearProfesor.vue').default);
const SeccionAsignaturaCoord=Vue.component('seccion-asign-coord-component', require('./components/SeccionAsignatura.vue').default);
const InfoAlumn=Vue.component('info-alumn-component', require('./components/VerInfoAlumno.vue').default);
const InfoProf=Vue.component('info-prof-component', require('./components/VerInfoProfesor.vue').default);
const InfoCoord=Vue.component('info-cood-component',require('./components/VerInfoCord.vue').default);
const VistCrearCorreoProfe=Vue.component('crear-correo-prof-component', require('./components/VistaCrearCorreo.vue').default);
const VistCrearCorreoAlumno=Vue.component('crear-correo-alumno-component', require('./components/VistaCrearCorreoAlumno.vue').default);
const routes = [

  { path: '/', component: Example },

  { path: '/horario', component: Horario },
  
  { path: '/asignaturas', component: asignaturasCoord },
  
  { path: '/crearAlumno', component: crearAlumnoCoord },
  
  { path: '/crearProfesor', component: crearProfCoord },
  
  { path: '/seccionAsignatura', component: SeccionAsignaturaCoord},
  
  { path: '/info', component: InfoAlumn},
  
  { path: '/infoP', component: InfoProf},

  { path: '/mensajesA', component: VistCrearCorreoAlumno},
  { path: '/mensajesP', component: VistCrearCorreoProfe},
  { path: '/infoCD', component: InfoCoord}
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
