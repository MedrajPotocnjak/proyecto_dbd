<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Crear asignatura</h2>
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                    
                        
                        <v-text-field
                        v-model="nombre"
                        :counter="60"
                        :rules="nombreRules"
                        label="Nombre Asignatura"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="jornada"
                        :counter="10"
                        :rules="generalRules"
                        label="Jornada"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="asistencia_minima"
                        :counter="3"
                        :rules="generalRules"
                        label="Asistencia minima"
                        max="100"
                        mask="###"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="ponderacion"
                        :counter="6"
                        :rules="generalRules"
                        label="Ponderacion (En formato ##/## o ###/#)"
                        required
                        ></v-text-field>

                        
                        <v-text-field
                        v-model="nivel"
                        label="Nivel"
                        :counter="2"
                        :rules="generalRules"
                        type="number"
                        min="1"
                        max="12"
                        mask="##"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="horas_teoria"
                        label="Horas teoria"
                        :counter="1"
                        :rules="generalRules"
                        min="0"
                        max="6"
                        mask="#"
                        type="number"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="horas_laboratorio"
                        label="Horas laboratorio"
                        :counter="1"
                        :rules="generalRules"
                        type="number"
                        min="0"
                        max="6"
                        mask="#"
                        required
                        ></v-text-field>
                      
                        <v-text-field
                        v-model="horas_ejercicios"
                        label="horas ejercicios"
                        :counter="1"
                        :rules="generalRules"
                        type="number"
                        min="0"
                        max="6"
                        mask="#"
                        required
                        ></v-text-field>


                        <v-text-field
                        v-model="version_plan_estudios"
                        :counter="7"
                        :rules="generalRules"
                        label="Version plan de estudios AAAA.Ver"
                        required
                        ></v-text-field>

                        <v-btn
                        :disabled="!valid"
                        color="success"
                        @click="submit"
                        >
                        Crear Asignatura
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
      nombre: '',
      nombreRules: [
        v => !!v || 'Nombre es requerido',
        v => (v && v.length <= 30) || 'Nombre debe tener un largo menor de 30'
      ],
      jornada: '',
      asistencia_minima: '',
      ponderacion: '',
      nivel: '',
      horas_teoria: '',
      horas_laboratorio: '',
      horas_ejercicios: '',
      version_plan_estudios: '',
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
