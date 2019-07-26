<template>
    <v-app id="inspire">
        <v-container fluid >
            <v-layout>
                <v-navigation-drawer permanent>
                    <v-toolbar flat class="primary" dark>
                        <v-list class="primary" dark>
                            <v-list-tile >
                                <v-list-tile-title justify-center class="title">
                                    <div>Hola, {{username}}</div>
                                </v-list-tile-title>
                            </v-list-tile>
                        </v-list>
                    </v-toolbar>
                    <v-list dense class="pt-0">
                        <v-list-tile
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
                userid: null,
                titles: [
                    { title: 'Información Personal', icon: 'description' , route: '/info'},
                    { title: 'Notas Anteriores', icon: 'assignment_ind' , route: '/notasOld'},
                    { title: 'Mi Horario', icon: 'calendar_today', route: '/horario'},
                    { title: 'Tomar Asignatura', icon: 'calendar_today', route: '/tomaHorario'},
                    { title: 'Enviar Mensaje', icon: 'forum' , route: '/mensajesP'},
                    { title: 'Bandeja de entrada', icon: 'mail_outline' , route: '/listaMensajesAlumno'},
                    { title: 'Pagos', icon: 'payment' , route: '/pagoAlumno' }
                    
                ],
            }
        },
        methods: {
            getUserName:function() {
                let url=window.location.href;
                let splitted=url.split("/alumno/");
                let userId=splitted[1];
                splitted=userId.split("/");
                userId=splitted[0];
                this.userid=userId;
                axios({
                    method: 'get',
                    url: 'http://192.168.10.10/Alumno/getNombre/' + this.userid,
                    headers: {

                    },
                    validateStatus: (status) => {
                        return true; // I'm always returning true, you may want to do it depending on the status received
                    }
                }).then(response => {
                    this.username = response.data
                });
            },
        },
        beforeMount(){
            this.getUserName();
        },
    }
</script>
