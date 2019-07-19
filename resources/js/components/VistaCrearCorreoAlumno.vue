<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Enviar mensaje Alumno</h2>
                   
                   
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                        <v-text-field
                        v-model="rut"
                        :counter="9"
                        :rules="rutRules"
                        label="Rut alumno destinatario"
                        mask="##.###.###-#"
                        required
                        ></v-text-field>
                        
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
  
    
  </div>
</template>

<script>
  export default {
    data: () => ({
      valid: true,
      rut: '',
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
      submit(){
          
      }
    }
  }
</script>