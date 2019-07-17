<template>
    <v-app id="inspire">
        <v-container fluid >
            <v-layout>
                <v-navigation-drawer permanent>
                    <v-toolbar flat class="primary" dark>
                        <v-list class="primary" dark>
                            <v-list-tile >
                                <v-list-tile-title justify-center class="title">
                                    LOA: Alumno
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
                titles: [
                    { title: 'Información Personal', icon: 'description' , route: '/'},
                    { title: 'Datos Curriculares', icon: 'assignment_ind' , route: '/'},
                    { title: 'Mi Horario', icon: 'calendar_today', route: '/horario'},
                    { title: 'Mensajes', icon: 'forum' , route: '/'},
                    { title: 'Pagos', icon: 'payment' , route: '/' }
                ],
                items: [
                    { title: 'Lunes' },
                    { title: 'Martes' },
                    { title: 'Miercoles'},
                    { title: 'Jueves'},
                    { title: 'Viernes'},
                    { title: 'Sábado'}
                ],
                bloques: [
                    { title: '8:00-9:30' },
                    { title: '9:30-11:10' },
                    { title: '11:20-12:50'},
                    { title: '13:50-15:20'},
                    { title: '15:30-17:00'},
                    { title: '17:00-6:40'}
                ],
            }
        }
    }
</script>
