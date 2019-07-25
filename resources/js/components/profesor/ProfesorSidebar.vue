<template>
    <v-app id="inspire">
        <v-container fluid >
            <v-layout>
                <v-navigation-drawer permanent>
                    <v-toolbar flat class="success" dark>
                        <v-list class="success" dark>
                            <v-list-tile >
                                <v-list-tile-title justify-center class="title">
                                    <div>{{username}}</div>
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
        name: "ProfesorSidebar",
        data () {
            return {
                username: null,
                titles: [
                    { title: 'Información Personal', icon: 'description' , route: '/infoP'},
                    { title: 'Mis Secciones', icon: 'calendar_today', route: '/phorario'},
                    { title: 'Enviar Mensaje', icon: 'forum' , route: '/mensajesA'},
                    { title: 'Bandeja de entrada', icon: 'mail_outline' , route: '/listaMensajesProfesor'}
                ],
            }
        },
        methods: {
            getUserName:function() {
                let url=window.location.href;
                let splitted=url.split("/profesor/");
                let userId=splitted[1];
                splitted=userId.split("/");
                userId=splitted[0];
                this.userid=userId;
                axios({
                    method: 'get',
                    url: 'http://192.168.10.10/Profesor/' + this.userid,
                    headers: {

                    },
                    validateStatus: (status) => {
                        return true; // I'm always returning true, you may want to do it depending on the status received
                    }
                }).then(response => {
                    this.username = response.data.nombres
                });
            },
        },
        beforeMount(){
            this.getUserName();
        },
    }
</script>
