<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Crear nueva Carrera</h2>
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >

                        <v-overflow-btn
                        class="my-2"
                        :items="departamento"
                        label="Departamento"
                        target="#dropdown-example-1"
                        ></v-overflow-btn>

                        
                        
                        
                        <v-text-field
                        v-model="nombre"
                        :counter="60"
                        :rules="nombreRules"
                        label="Nombre carrera"
                        required
                        ></v-text-field>

                       <v-text-field
                        v-model="asignaturas_plan"
                        :counter="3"
                        :rules="asignaturas_planRules"
                        label="Numero de Asignaturas del plan"
                        mask="###"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="cantidad_alumnos"
                        :counter="4"
                        :rules="cantidad_alumnosRules"
                        label="Cantidad de Alumnos"
                        mask="####"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="arancel"
                        :counter="10"
                        :rules="arancelRules"
                        label="Arancel"
                        mask="##########"
                        required
                        ></v-text-field>

                        


                        <v-btn
                        :disabled="!valid"
                        color="success"
                        @click="submit"
                        >
                        Crear Carrera
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
      departamento: ['Depa1', 'Depa4', 'Depa3', 'Depa2'],
      asignaturas_plan: '',
      asignaturas_planRules: [
        v => !!v || 'Asignaturas plan es requerido',
        v => (v && v.length <= 3) || 'Asignaturas plan debe tener un largo menor de 3 enteros'
      ],
      nombre: '',
      nombreRules: [
        v => !!v || 'Nombre es requerido',
        v => (v && v.length <= 30) || 'Nombre debe tener un largo menor de 30'
      ],
      cantidad_alumnos: '',
      cantidad_alumnosRules: [
        v => !!v || 'Cantidad de alumnos es requerido',
      ],
      arancel: '',
      arancelRules: [
        v => !!v || 'Arancel es requerido',
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