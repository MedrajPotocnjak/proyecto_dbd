<template>
    <v-app id="inspire">
        <v-container grid-list-xs text-xs-center md1>
            <v-flex v-for="seccion in secciones" :key="item">
                <v-expansion-panel dark>
                    <v-expansion-panel-content v-bind:class="seccion.color">
                        <div slot="header">{{seccion.nombre+' | '+seccion.profesor}}</div>
                        <v-card light>
                            <v-card-title>Notas</v-card-title>
                            <v-card-text>
                                PEP 1: {{seccion.P1}} <br>
                                PEP 2: {{seccion.P2}} <br>
                                PEP 3: {{seccion.P3}} <br>
                                Control 1: {{seccion.C1}} <br>
                                Control 2: {{seccion.C2}} <br>
                                Control 3: {{seccion.C3}} <br>
                                Promedio: {{seccion.promedio}} <br>
                                Aprobado: {{seccion.aprobado}}
                            </v-card-text>
                        </v-card>
                    </v-expansion-panel-content>
                </v-expansion-panel>
            </v-flex>
        </v-container>
    </v-app>
</template>

<script>

    export default {
        name: "AlumnoSidebar",
        data () {
            return {
                right: null,
                secciones: null,
                loading: true
            }
        },
        methods: {
            getData:function() {
                let url=window.location.href;
                let splitted=url.split("/alumno/");
                let userId=splitted[1];
                splitted=userId.split("/");
                userId=splitted[0];
                this.userid=userId;
                axios({
                    method: 'get',
                    url: 'http://192.168.10.10/verCalificacionesOld/' + this.userid,
                    headers: {

                    },
                    validateStatus: (status) => {
                        return true; // I'm always returning true, you may want to do it depending on the status received
                    }
                }).then(response => {
                    this.secciones = response.data;
                });
                this.loading=false;
            },
        },
        beforeMount(){
            this.getData();
        },
    }
</script>
