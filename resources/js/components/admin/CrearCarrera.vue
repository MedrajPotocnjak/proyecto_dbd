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
                        item-text="nombre"
                        item-value="codigo"
                        label="Departamento"
                        v-model="depto"
                        target="#dropdown-example-1"
                        required
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
                        :counter="9"
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
            <v-snackbar
                v-model="snackbar"
                :bottom=true
                :timeout=4000
                :vertical="mode === 'vertical'"
            >
                {{snackbarText}}
            </v-snackbar>
        </v-flex>
  
    
  </div>
</template>

<script>
  export default {
    data: () => ({
      snackbar: false,
      snackbarText: "Carrera Creado",
      valid: true,
      depto: null,
      departamento: '',
      asignaturas_plan: 0,
      asignaturas_planRules: [
        v => !!v || 'Asignaturas plan es requerido',
        v => (v && v.length <= 3) || 'Asignaturas plan debe tener un largo menor de 3 enteros'
      ],
      nombre: '',
      nombreRules: [
        v => !!v || 'Nombre es requerido',
        v => (v && v.length <= 30) || 'Nombre debe tener un largo menor de 30'
      ],
      cantidad_alumnos: 0,
      cantidad_alumnosRules: [
        v => !!v || 'Cantidad de alumnos es requerido',
      ],
      arancel: 0,
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
          axios.post('http://192.168.10.10/Carrera/', {
            'nombre': this.nombre,

            'codigo_departamento': this.depto,

            'asignaturas_plan': this.asignaturas_plan,
            'cantidad_alumnos': this.cantidad_alumnos,
            'arancel': this.arancel
          }).then(response => {

          });
          this.snackbar=true;
      },
      getDepto() {
          axios.get('http://192.168.10.10/Departamento/', {
          }).then(response => {
            this.departamento=response.data;
          });
      }
    },
    beforeMount() {
          this.getDepto();
      },
  }
</script>