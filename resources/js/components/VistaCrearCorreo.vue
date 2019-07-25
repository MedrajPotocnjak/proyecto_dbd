<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Enviar mensaje Profesor</h2>
                   
                   
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                         <v-overflow-btn
                        class="my-3"
                        :items="profesor"
                        item-text="nombres"
                        item-value="rut"
                        label="Profesor"
                        v-model="profe"
                        target="#dropdown-example-2"
                        required
                        ></v-overflow-btn>
                        
                      <v-text-field
                        v-model="asunto"
                        :counter="128"
                        :rules="asuntoRules"
                        label="asunto"
                        required
                        ></v-text-field>

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
                        Enviar Mensaje
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
      profe: null,
      snackbar: false,
      snackbarText: "Mensaje enviado",
      rutRules: [
        v => !!v || 'Rut es requerido',
        v => (v && v.length <= 9) || 'Rut debe tener un largo menor de 9'
      ],
      asunto: '',
      asuntoRules: [
        v => !!v || 'Asunto es requerido',
        v => (v && v.length <= 128) || 'Asunto debe tener un largo menor de 128'
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
          axios.post('http://192.168.10.10/Alumno/createMensaje/'+ this.userid, {

            "rut_profesor": this.profe,
            "asunto": this.asunto,
            "contenido": this.contenido
          }).then(response => {

          });
          this.snackbar=true;
      },
      getProfe() {
          axios.get('http://192.168.10.10/Profesor/', {
          }).then(response => {
            this.profesor=response.data;
           });
      }
    },
    beforeMount() {
          this.getUserName();
          this.getProfe();
      },
  }
</script>