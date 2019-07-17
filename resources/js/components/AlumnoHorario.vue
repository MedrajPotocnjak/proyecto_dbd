<template>
    <v-app id="inspire">
        <v-container grid-list-xs text-xs-center md1>
            <v-layout row wrap>
                <v-flex xs12>
                    <v-card dark color="primary">
                        <v-card-text class="px-0">Horario de Clases</v-card-text>
                    </v-card>
                </v-flex>
                <v-flex v-for="item in items" :key="item.title" xs2>
                    <v-card dark color="primary">
                        <v-card-text class="px-0">{{item.title}}</v-card-text>
                    </v-card>
                </v-flex>

            </v-layout>
            <v-layout row wrap>
                <v-layout column v-for="n in 6":key="'6${i}'">
                    <v-flex v-for="bloque in bloques" :key="bloque.title" xs1>
                        <v-card color="blue lighten-5">
                            <v-card-text class="px-0">{{bloque.title}}</v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-layout>
        </v-container>
        <v-spacer></v-spacer>
        <v-container grid-list-xs text-xs-center md1>
            <v-expansion-panel dark>
                <v-expansion-panel-content class="deep-purple">
                    <div slot="header">Ingenieria en Caca</div>
                    <v-card light>
                        <v-card-text>Notas:<br/>Pep 1: 7.0</v-card-text>
                    </v-card>
                </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel dark>
                <v-expansion-panel-content class="teal">
                    <div slot="header">Fundamentos de Orrego II</div>
                    <v-card light>
                        <v-card-text>Notas:<br/>Pep 1: 2.0</v-card-text>
                    </v-card>
                </v-expansion-panel-content>
            </v-expansion-panel>
            <v-flex xs12>
                <v-card dark color="teal">
                    <v-card-text class="px-0">Analisis de Telas</v-card-text>
                </v-card>
            </v-flex>
            <v-flex xs12>
                <v-card dark color="amber">
                    <v-card-text class="px-0">Fundamentos de Cosas I</v-card-text>
                </v-card>
            </v-flex>
        </v-container>
    </v-app>
</template>

<script>

    export default {
        name: "AlumnoSidebar",
        data () {
            return {
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
                right: null
            }
        }
    }
</script>

<style scoped>

</style>
