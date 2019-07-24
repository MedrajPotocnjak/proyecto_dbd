<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Crear nuevo Departamento</h2>
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                        <v-text-field
                        v-model="rut"
                        :counter="9"
                        :rules="rutRules"
                        label="Rut Coordinador"
                        mask="##.###.###-#"
                        required
                        ></v-text-field>
                        
                        <v-text-field
                        v-model="nombre"
                        :counter="60"
                        :rules="nombreRules"
                        label="Nombre Departamento"
                        required
                        ></v-text-field>

                        


                        <v-btn
                        :disabled="!valid"
                        color="success"
                        @click="submit"
                        >
                        Crear Departamento
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
        v => (v && v.length <= 30) || 'Rut debe tener un largo menor de 30'
      ],
      nombre: '',
      nombreRules: [
        v => !!v || 'Nombre es requerido',
        v => (v && v.length <= 60) || 'Nombre debe tener un largo menor de 30'
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