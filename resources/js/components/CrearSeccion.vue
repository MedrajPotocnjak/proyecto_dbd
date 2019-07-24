<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Crear nueva Seccion</h2>
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                        <v-overflow-btn
                        class="my-2"
                        :items="profesor"
                        label="Profesor"
                        required
                        ></v-overflow-btn>
                        
                        <v-overflow-btn
                        class="my-2"
                        :items="asignatura"
                        label="Asignatura"
                        required
                        ></v-overflow-btn>

                        <v-text-field
                        v-model="nombre"
                        :counter="60"
                        :rules="nombreRules"
                        label="Nombre"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="cupos"
                        :counter="15"
                        :rules="generalRules"
                        label="Cupos"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="tipo"
                        :counter="1"
                        :rules="generalRules"
                        label="Tipo (T-E-L)"
                        
                        required
                        ></v-text-field>

                        

                        

                        <v-btn
                        :disabled="!valid"
                        color="success"
                        @click="submit"
                        >
                        Crear Seccion
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
      
      rutRules: [
        v => !!v || 'Rut es requerido',
        v => (v && v.length <= 30) || 'Rut debe tener un largo menor de 30'
      ],
      profesor: ['Profe1', 'Profe13', 'Profe41', 'Profe81'],
      asignatura: ['A2', 'ASIG B', 'ASIG A', ' UWU'],
      rut_profesor: '',
      nombre: '',
      codigo_asignatura: '',
      cupos: '',
      tipo: '',
      nombreRules: [
        v => !!v || 'Nombre es requerido',
        v => (v && v.length <= 60) || 'Nombre debe tener un largo menor de 30'
      ],
      generalRules: [
        v => !!v || 'Este campo es requerido'
      ]
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