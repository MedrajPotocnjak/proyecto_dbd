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
                        :items="asignatura"
                        item-text="nombre"
                        item-value="codigo"
                        label="Asignatura"
                        v-model="asig"
                        target="#dropdown-example-1"
                        required
                        ></v-overflow-btn>
                        
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
      valid: true,
      snackbar: false,
      snackbarText: "Seccion Creada",
      asig: null,
      profe: null,
      rutRules: [
        v => !!v || 'Rut es requerido',
        v => (v && v.length <= 30) || 'Rut debe tener un largo menor de 30'
      ],

      asignatura: '',
      profesor: '',
      nombre: '',
      cupos: 0,
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
        axios.post('http://192.168.10.10/Seccion/', {
            'rut_profesor': this.profe,
            'codigo_asignatura': this.asig,
            'nombre': this.nombre,
            'cupos': this.cupos,
            'tipo': this.tipo
          }).then(response => {

          });
          this.snackbar=true;
      },
      getAsignatura() {
          axios.get('http://192.168.10.10/Asignatura/', {
          }).then(response => {
            this.asignatura=response.data;
          });
      },
      getProfe() {
          axios.get('http://192.168.10.10/Profesor/', {
          }).then(response => {
            this.profesor=response.data;
           });
      }
    },
    beforeMount() {
          this.getAsignatura();
          this.getProfe();
      },
  }
</script>