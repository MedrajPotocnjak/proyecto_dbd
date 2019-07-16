<template>
    <v-app id="inspire">
        <v-layout wrap>
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
                        v-for="item in items" :key="item.title" :to="item.route"
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
            <v-fade-transition mode="out-in">
                <router-view></router-view>
            </v-fade-transition>
        </v-layout>
    </v-app>
</template>

<script>

    export default {
        name: "AlumnoSidebar",
        data () {
            return {
                items: [
                    { title: 'Información Personal', icon: 'description' , route: '/'},
                    { title: 'Datos Curriculares', icon: 'assignment_ind' , route: '/'},
                    { title: 'Mi Horario', icon: 'calendar_today', route: '/horario'},
                    { title: 'Mensajes', icon: 'forum' , route: '/'},
                    { title: 'Pagos', icon: 'payment' , route: '/' }
                ],
                right: null
            }
        }
    }
</script>

<style scoped>

</style>
