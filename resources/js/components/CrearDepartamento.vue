<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Crear nuevo Departamento {{coordinador}}</h2>
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                         <v-overflow-btn
                        class="my-2"
                        :items="coordinadores"
                        item-text="rut"
                        label="Coordinador"
                        v-model="coordinador"
                        target="#dropdown-example-1"
                        required
                        ></v-overflow-btn>
                        
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
      rut: '',
        snackbar: false,
        snackbarText: "Departamento Creado",
      rutRules: [
        v => !!v || 'Rut es requerido',
        v => (v && v.length <= 30) || 'Rut debe tener un largo menor de 30'
      ],
      coordinadores:  ['C2', 'C3', 'C4', 'C5'],
      coordinador: null,
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
          axios.post('http://192.168.10.10/Departamento/', {
            'nombre': this.nombre,
              'rut_coordinador' : this.coordinador
          }).then(response => {

          });
          this.snackbar=true;
      },
      getCoord() {
          axios.get('http://192.168.10.10/CoordinadorDocente/', {
          }).then(response => {
            this.coordinadores=response.data;
          });
      }
    },
    beforeMount() {
          this.getCoord();
      },
  }
</script>
