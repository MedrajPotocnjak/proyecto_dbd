<template>
    <v-app>
    <div>
        <v-parallax height="720" src="img/hero.png">
            <v-content>
                <v-container fluid fill-height>
                    <v-layout align-center justify-center>
                        <v-flex xs12 sm8 md6>
                            <v-card class="elevation-12">
                                <v-toolbar dark v-bind:color="loginValue">
                                    <v-toolbar-title>Ingreso a la Plataforma</v-toolbar-title>
                                    <v-spacer></v-spacer>
                                </v-toolbar>
                                <v-card-text>
                                    <v-form>
                                        <v-text-field prepend-icon="person" name="login" label="Rut (0 en vez de K)" type="text" mask="##.###.###-#" v-model="rut"></v-text-field>
                                        <v-text-field prepend-icon="lock" name="password" label="Password" id="password" type="password" v-model="pass"></v-text-field>
                                    </v-form>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn dark v-bind:color="loginValue" v-on:click="loginUser()">Login</v-btn>
                                    <v-btn color="error" v-on:click="loginGmail()">Login Gmail</v-btn>
                                    <v-spacer></v-spacer>
                                    <v-radio-group row justify-end v-model="loginValue">
                                        <v-radio value="primary" color="primary" label="Alumno"></v-radio>
                                        <v-radio value="success" color="success" label="Profesor"></v-radio>
                                        <v-radio value="orange" color="orange" label="Coordinador"></v-radio>
                                    </v-radio-group>
                                </v-card-actions>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
            <v-snackbar
                v-model="snackbar"
                :bottom=true
                :timeout=4000
                :vertical="mode === 'vertical'"
            >
                {{snackbarText}}
            </v-snackbar>
        </v-parallax>
        <v-footer class="pa-3">
            {{rut}}
            <v-spacer></v-spacer>
            <div>Proyecto DBD&copy; {{ new Date().getFullYear() }}</div>
        </v-footer>
    </div>
    </v-app>
</template>

<style scoped>
    .buttons {
        width: 320px;
    }
    #inspire img {
        height: 150%
    }
</style>


<script>
    export default {
        data () {
            return {
                loginValue: 'primary',
                loginType: 'alumno',
                rut: '',
                pass: '',
                snackbar:false,
                snackbarText:'Debe rellenar usuario y contraseña',
            }
        },
        methods: {
            setLoginType:function() {
                if (this.loginValue=='primary') {
                    this.loginType='alumno';
                }
                else if (this.loginValue=='success') {
                    this.loginType='profesor';
                }
                else {
                    this.loginType='coordinador';
                }
            },
            loginGmail: function() {
                this.setLoginType();
                window.location.href = "http://192.168.10.10/redirect"
            },
            loginUser: function() {
                this.setLoginType();
                if (this.rut!='' || this.pass!='') {
                    window.location.href = "http://192.168.10.10/loginMulti/" + this.loginType + "/" + this.rut + "/" + this.pass;
                }
                else {
                    this.snackbarText='Falta Rut o Contraseña.'
                    this.snackbar=true;
                }
            },

        }
    }
</script>

