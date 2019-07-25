<template>
    <v-app id="inspire">
        <v-container fluid >
            <v-layout>
                <v-navigation-drawer permanent>
                    <v-toolbar flat class="orange" dark>
                        <v-list class="orange" dark>
                            <v-list-tile >
                                <v-list-tile-title justify-center class="title">
                                    <div>Hola, {{username}}</div>
                                </v-list-tile-title>
                            </v-list-tile>
                        </v-list>
                    </v-toolbar>
                    <v-list dense class="pt-0" >
                        <v-list-tile color="orange"
                            v-for="item in titles" :key="item.title" :to="item.route"
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
        name: "CoordinadorSidebar",
        data () {
            return {
                username: null,
                userid: null,
                titles: [
                    { title: 'Información Personal', icon: 'description' , route: '/infoCD'},
                    { title: 'Alumnos', icon: 'mood' , route: '/crearAlumno'},
                    { title: 'Profesor', icon: 'sentiment_very_dissatisfied', route: '/crearProfesor'},
                    { title: 'Horarios', icon: 'view_stream' , route: '/seccionHorario'},

                    
                    { title: 'Secciones', icon: 'view_module' , route: '/seccionAsignatura' }


                ],
            }
        },
        methods: {
            getUserName:function() {
                let url=window.location.href;
                let splitted=url.split("/coordinador/");
                let userId=splitted[1];
                splitted=userId.split("/");
                userId=splitted[0];
                this.userid=userId;
                axios({
                    method: 'get',
                    url: 'http://192.168.10.10/CoordinadorDocente/getNombre/' + this.userid,
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
