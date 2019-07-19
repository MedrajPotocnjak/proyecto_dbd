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
                <v-layout column v-for="dia in this.horario":key="id">
                    <v-flex v-for="bloque in dia" :key="id" xs1>
                            <v-card v-bind:color="bloque.color">
                                <v-card-text class="xs1">{{bloque.sala}}</v-card-text>
                            </v-card>
                    </v-flex>
                </v-layout>
            </v-layout>
        </v-container>
        <v-spacer></v-spacer>
        <v-container grid-list-xs text-xs-center md1>
            <v-expansion-panel dark>
                <v-expansion-panel-content class="deep-purple">
                    <div slot="header">Ingenieria en Fisica</div>
                    <v-card light>
                        <v-card-text>Notas:<br/>Pep 1: 7.0</v-card-text>
                    </v-card>
                </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel dark>
                <v-expansion-panel-content class="teal">
                    <div slot="header">Diseño de Calculo II</div>
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
        name: "ProfesorHorario",
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
                    { title: '17:00-18:40'}
                ],
                right: null,
                horario: null,
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
                    url: 'http://192.168.10.10/Profesor/verHorario/' + this.userid,
                    headers: {

                    },
                    validateStatus: (status) => {
                        return true; // I'm always returning true, you may want to do it depending on the status received
                    }
                }).then(response => {
                    this.horario = response.data;
                });
            },
        },
        beforeMount(){
            this.getUserName();
        },
    }
</script>

