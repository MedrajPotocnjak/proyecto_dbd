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
                                        <v-text-field prepend-icon="person" name="login" label="Login" type="text"></v-text-field>
                                        <v-text-field prepend-icon="lock" name="password" label="Password" id="password" type="password"></v-text-field>
                                    </v-form>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn v-bind:color="loginValue">Login</v-btn>
                                    <v-btn color="error">Login Gmail</v-btn>
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
        </v-parallax>
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
                loginValue: 'primary'
            }
        }
    }
</script>

