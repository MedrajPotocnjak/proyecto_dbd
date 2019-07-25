<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Crear Sala</h2>
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                    
                        
                        <v-text-field
                        v-model="nombre"
                        :counter="60"
                        :rules="nombreRules"
                        label="Nombre Sala"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="ubicacion"
                        :counter="10"
                        :rules="generalRules"
                        label="ubicacion"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="cantidad_puestos"
                        :counter="3"
                        :rules="generalRules"
                        label="Cantidad Puestos"
                        type="number"
                        min="1"
                        max="100"
                        mask="###"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="cantidad_computadores"
                        :counter="2"
                        :rules="generalRules"
                        min="-1"
                        type="number"
                        label="Cantidad computadores disponibles"
                        required
                        ></v-text-field>

                        
                        

                        <v-btn
                        :disabled="!valid"
                        color="success"
                        @click="submit"
                        >
                        Crear Sala
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
      snackbarText: "Sala Creada",
      nombre: '',
      nombreRules: [
        v => !!v || 'Nombre es requerido',
        v => (v && v.length <= 30) || 'Nombre debe tener un largo menor de 30'
      ],
      ubicacion: '',
      cantidad_puestos:  0,
      cantidad_computadores:  0,
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
        axios.post('http://192.168.10.10/Sala/', {
            'nombre': this.nombre,
            'ubicacion': this.ubicacion,
            'cantidad_puestos': this.cantidad_puestos,
            'cantidad_computadores': this.cantidad_computadores,
          }).then(response => {

          });
          this.snackbar=true;
      }
    }
  }
</script>
