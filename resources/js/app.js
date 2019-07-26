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

//Login
const Example=Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Alumno
const Features=Vue.component('alumno-sidebar-component', require('./components/alumno/AlumnoSidebar.vue').default);
const Horario=Vue.component('alumno-horario-component', require('./components/alumno/AlumnoHorario.vue').default);
const tomaHorario=Vue.component('toma-horario-component',require('./components/alumno/TomaHorario.vue').default);
const NotasAlumno=Vue.component('notas-alumno-component',require('./components/alumno/AlumnoNotasViejas.vue').default);
const InfoAlumn=Vue.component('info-alumn-component', require('./components/alumno/VerInfoAlumno.vue').default);
const pagoAlumno=Vue.component('pago-alumn-component', require('./components/alumno/PagoAlumno.vue').default);

//Profesor
const PHorario=Vue.component('profesor-horario-component', require('./components/profesor/ProfesorHorario.vue').default);
const barraProfe=Vue.component('profesor-sidebar-component', require('./components/profesor/ProfesorSidebar.vue').default);
const InfoProf=Vue.component('info-prof-component', require('./components/profesor/VerInfoProfesor.vue').default);
const Notas=Vue.component('notas-prof-component', require('./components/profesor/ProfesorNotas.vue').default);
const DocP=Vue.component('doc-prof-component', require('./components/profesor/DocumentosProfesor.vue').default);

//Coordinador
const InfoCoord=Vue.component('info-cood-component',require('./components/coordinador/VerInfoCord.vue').default);
const barraCoord=Vue.component('coordinador-sidebar-component', require('./components/coordinador/CoordinadorSidebar.vue').default);
const asignaturasCoord=Vue.component('asignatura-coordinador-sidebar-component', require('./components/coordinador/AsignaturasCoordinador.vue').default);
const crearAlumnoCoord=Vue.component('coordinador-crear-alumno-sidebar-component', require('./components/coordinador/CrearAlumno.vue').default);
const crearProfCoord=Vue.component('coordinador-crear-prof-sidebar-component', require('./components/coordinador/CrearProfesor.vue').default);
const SeccionAsignaturaCoord=Vue.component('seccion-asign-coord-component', require('./components/coordinador/SeccionAsignatura.vue').default);
const seccionHorario=Vue.component('seccion-horario-component',require('./components/coordinador/SeccionHorario.vue').default);

//Admin
const InfoAdmin=Vue.component('info-admin-component',require('./components/admin/VerInfoAdmin.vue').default);
const barraAdmin=Vue.component('administrador-sidebar-component', require('./components/admin/AdministradorSidebar.vue').default);
const crearAsignatura=Vue.component('crear-asig-component',require('./components/admin/CrearAsignatura.vue').default);
const crearCarrera=Vue.component('crear-carrera-component',require('./components/admin/CrearCarrera.vue').default);
const crearCoordinador=Vue.component('crear-coordinador-component',require('./components/admin/CrearCoordinador.vue').default);
const crearSeccion=Vue.component('crear-seccion-component',require('./components/admin/CrearSeccion.vue').default);
const crearDepto=Vue.component('crear-depto-component',require('./components/admin/CrearDepartamento.vue').default);
const crearSala=Vue.component('crear-sala-component',require('./components/admin/CrearSala.vue').default);


//Listas
const listaAlumnosSistema=Vue.component('lista-alumnossis-component', require('./components/listas/ListaAlumnosSistema.vue').default);
const listaProfesoresSistema=Vue.component('lista-profesoressis-component',require('./components/listas/ListaProfesoresSistema.vue').default);
const listaCoordinadoresSistema=Vue.component('lista-coordsis-component',require('./components/listas/ListaCoordinadoresSistema.vue').default);
const listaMensajesAlumno=Vue.component('mensajes-alumno-component',require('./components/listas/ListaMensajesAlumno.vue').default);
const listaMensajesProfesor=Vue.component('mensajes-profesor-component',require('./components/listas/ListaMensajesProfesor.vue').default);
const listaCarrerasSistema=Vue.component('lista-carrera-component',require('./components/listas/ListaCarrerasSistema.vue').default);
const listaSeccionesSistema=Vue.component('lista-secciones-component',require('./components/listas/ListaSeccionesSistema.vue').default);
const listaDepartamentosSistema=Vue.component('lista-deptos-component',require('./components/listas/ListaDepartamentosSistema.vue').default);
const listaAsignaturasSistema=Vue.component('lista-asignaturas-component',require('./components/listas/ListaAsignaturasSistema.vue').default);
const listaSalasSistema=Vue.component('lista-salas-component',require('./components/listas/ListaSalasSistema.vue').default);



//???
const VistCrearCorreoProfe=Vue.component('crear-correo-prof-component', require('./components/VistaCrearCorreo.vue').default);
const VistCrearCorreoAlumno=Vue.component('crear-correo-alumno-component', require('./components/VistaCrearCorreoAlumno.vue').default);


const routes = [
  
  { path: '/listaSalasSistema', component: listaSalasSistema },
  { path: '/listaAsignaturasSistema', component: listaAsignaturasSistema },
  { path: '/listaAlumnosSistema', component: listaAlumnosSistema },
  { path: '/listaProfesoresSistema', component: listaProfesoresSistema },
  { path: '/listaCoordinadoresSistema', component: listaCoordinadoresSistema },
  { path: '/listaMensajesAlumno', component: listaMensajesAlumno },
  { path: '/listaMensajesProfesor', component: listaMensajesProfesor },
  { path: '/listaCarrerasSistema', component: listaCarrerasSistema },
  { path: '/listaSeccionesSistema', component: listaSeccionesSistema },
  { path: '/listaDepartamentosSistema', component: listaDepartamentosSistema },
  
  
  
  { path: '/tomaHorario', component: tomaHorario },
  { path: '/', component: Example },

  { path: '/horario', component: Horario },
  { path: '/phorario',component: PHorario},
  { path: '/asignaturas', component: asignaturasCoord },
  
  { path: '/crearAlumno', component: crearAlumnoCoord },
  
  { path: '/crearProfesor', component: crearProfCoord },
  
  { path: '/seccionAsignatura', component: SeccionAsignaturaCoord},
  
  { path: '/info', component: InfoAlumn},
  
  { path: '/infoP', component: InfoProf},
{ path: '/infoA', component: InfoAdmin},
  { path: '/mensajesA', component: VistCrearCorreoAlumno},
  { path: '/mensajesP', component: VistCrearCorreoProfe},
  { path: '/infoCD', component: InfoCoord},
  { path: '/notasOld', component: NotasAlumno},
  { path: '/crearDepto', component: crearDepto},
  { path: '/crearAsignatura',component: crearAsignatura},
  { path: '/crearCarrera',component: crearCarrera},
  { path: '/crearCoordinador',component: crearCoordinador},
  { path: '/crearSeccion',component: crearSeccion},
  { path: '/crearSala',component: crearSala},
  { path: '/seccionHorario',component: seccionHorario},
  { path: '/notas',component: Notas},
  { path: '/docP',component:DocP}

  { path: '/pagoAlumno',component: pagoAlumno},
];

const router = new VueRouter({
  routes 
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router
}).$mount('#app');
