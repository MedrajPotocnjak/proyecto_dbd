<template>
    <v-app id="inspire">
        <v-container fluid >
            <v-layout>
                <v-navigation-drawer permanent>
                    <v-toolbar flat class="blue-grey darken-2" dark>
                        <v-list class="blue-grey darken-2" dark>
                            <v-list-tile >
                                <v-list-tile-title justify-center class="title">
                                    <div>{{username}}</div>
                                </v-list-tile-title>
                            </v-list-tile>
                        </v-list>
                    </v-toolbar>
                    <v-list dense class="pt-0" >
                        <v-list-tile color="blue-grey darken-2"
                            v-for="item in titles" :key="item.title" :to="item.route"
                            @click=""
                        >
                            <v-list-tile-action>
                                <v-icon>{{ item.icon }}</v-icon>
                            </v-list-tile-action>

                            <v-list-tile-content>

                                <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>
                </v-navigation-drawer>
                <v-container fluid >
                    <v-fade-transition mode="out-in">
                        <router-view></router-view>
                    </v-fade-transition>
                </v-container>
            </v-layout>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        name: "AlumnoSidebar",
        data () {
            return {
                username: null,
                titles: [
                    { title: 'Información Personal', icon: 'description' , route: '/'},
                    { title: 'Crear Alumnos', icon: 'face' , route: '/crearAlumno'},
                    { title: 'Alumnos Sistema', icon: 'view_stream' , route: '/listaAlumnosSistema'},
                    { title: 'Crear Profesor', icon: 'face', route: '/crearProfesor'},
                    { title: 'Profesores Sistema', icon: 'view_stream' , route: '/listaProfesoresSistema'},
                    { title: 'Crear Coordinador', icon: 'description' , route: '/crearCoordinador'},
                    { title: 'Coordinadore Sistema', icon: 'view_stream' , route: '/listaCoordinadoresSistema'},
                    { title: 'Crear Departamento', icon: 'forum' , route: '/crearDepto'},
                    { title: 'Departamentos Sistema', icon: 'view_stream' , route: '/listaDepartamentosSistema'},
                    { title: 'Crear Carrera', icon: 'description' , route: '/crearCarrera'},
                    { title: 'Carreras Sistema', icon: 'view_stream' , route: '/listaCarrerasSistema'},

                    { title: 'Crear Asignatura', icon: 'description' , route: '/crearAsignatura'},
                    { title: 'Lista Asignaturas', icon: 'view_stream' , route: '/listaAsignaturasSistema'},
                    
                    { title: 'Crear Seccion', icon: 'description' , route: '/crearSeccion'},
                    { title: 'Lista Secciones', icon: 'view_stream' , route: '/listaSeccionesSistema'},
                    { title: 'Crear Sala', icon: 'description' , route: '/crearSala'},
                    { title: 'Lista Salas', icon: 'view_stream' , route: '/listaSalasSistema'},
                    
                    { title: 'listaMensajesAlumno', icon: 'view_stream' , route: '/listaMensajesAlumno'},
                    { title: 'listaMensajesProfesor', icon: 'view_stream' , route: '/listaMensajesProfesor'}
                    
                    
                ],
            }
        },


        methods: {
            getUserName:function() {
              axios.get('http://192.168.10.10/Alumno')
                  .then(response=> {this.username=response.data.nombre;});
            },
        },
        beforeMount(){
            this.getUserName();
        },
    }
</script>
