<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Enviar Solicitud</h2>
                   
                   Cada solicitud comparte el mismo formato, al momento de descargar el documento, <br>
                   se mostrarán sus información personal y situación academica, junto con el contenido del apartado de acontinuación. <br> 
                   Especificar tipo de solicitud al entregar este documento.              
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                        
                        
                    

                      <v-textarea
                        v-model="contenido"
                        :rules="contenidoRules"
                        label="contenido"
                        required
                        ></v-textarea>


                        <v-btn
                        :disabled="!valid"
                        color="success"
                        @click="submit"
                        >
                        Crear Solicitud
                        </v-btn>

                        
                    </v-form>
                             
                </v-container>
            </v-card>
        </v-flex>
        <v-snackbar
                v-model="snackbar"
                :bottom=true
                :timeout=4000
                :vertical="mode === 'vertical'"
            >
                {{snackbarText}}
            </v-snackbar>
    
  </div>
</template>

<script>
  export default {
    data: () => ({
      valid: true,
      userid: '',
      alum: null,
      snackbar: false,
      snackbarText: "Solicitud Archivada",
      rutRules: [
        v => !!v || 'Rut es requerido',
        v => (v && v.length <= 9) || 'Rut debe tener un largo menor de 9'
      ],
      contenido: '',
      contenidoRules: [
        v => !!v || 'Contenido es requerido'
      ],

    }),

    methods: {
      validate () {
        if (this.$refs.form.validate()) {
          this.snackbar = true
        }
      },
        getUserName:function() {
            let url = window.location.href;
            let splitted = url.split("/alumno/");
            let userId = splitted[1];
            splitted = userId.split("/");
            userId = splitted[0];
            this.userid = userId;
      },
      submit(){
          axios.post('http://192.168.10.10/Alumno/createSolicitud/'+ this.userid, {
            "contenido": this.contenido
          }).then(response => {

          });
          this.snackbar=true;
      },
      getUserName:function() {
            let url = window.location.href;
            let splitted = url.split("/alumno/");
            let userId = splitted[1];
            splitted = userId.split("/");
            userId = splitted[0];
            this.userid = userId;
      }
    },
    beforeMount() {
          this.getUserName();
      },
  }
</script>