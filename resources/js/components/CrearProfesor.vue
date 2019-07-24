<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Crear nuevo Profesor</h2>
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                        <v-text-field
                        v-model="rut"
                        :counter="9"
                        :rules="rutRules"
                        label="Rut"
                        mask="##.###.###-#"
                        required
                        ></v-text-field>
                        
                        <v-text-field
                        v-model="nombres"
                        :counter="30"
                        :rules="nombreRules"
                        label="Nombre"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="apellido_paterno"
                        :counter="15"
                        :rules="apellido_paternoRules"
                        label="Apellido paterno"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="apellido_materno"
                        :counter="15"
                        :rules="apellido_maternoRules"
                        label="Apellido materno"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="password"
                        :counter="255"
                        :rules="passwordRules"
                        label="Contraseña"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="area"
                        :counter="30"
                        :rules="areaRules"
                        label="Area"
                        required
                        ></v-text-field>

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
                        v-model="fecha_nacimiento"
                        :counter="10"
                        :rules="fecha_nacimientoRules"
                        label="Fecha nacimiento (En formato: DD/MM/AAAA)"
                        mask="##-##-####"
                        return-masked-value="true"
                        required
                        ></v-text-field>
                        <v-text-field
                        v-model="nacionalidad"
                        :counter="20"
                        :rules="nacionalidadRules"
                        label="Nacionalidad"
                        
                        required
                        ></v-text-field>
                      
                        <v-text-field
                        v-model="sexo"
                        :counter="1"
                        :rules="sexoRules"
                        label="Sexo"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="telefono"
                        :counter="12"
                        :rules="telefonoRules"
                        label="Telefono"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="region"
                        :counter="30"
                        :rules="regionRules"
                        label="Region"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="comuna"
                        :counter="30"
                        :rules="comunaRules"
                        label="Comuna"
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="provincia"
                        :counter="30"
                        :rules="provinciaRules"
                        label="Provincia"
                        required
                        ></v-text-field>


                        <v-text-field
                        v-model="correo"
                        :rules="correoRules"
                        :counter="40"
                        label="Correo"
                        required
                        ></v-text-field>



                        <v-btn
                        :disabled="!valid"
                        color="orange"
                        @click="submit"
                        >
                        Crear Profesor
                        </v-btn>
                        {{rut}} / {{nombres}} / {{apellido_paterno}} / {{apellido_materno}} / {{depto}} / {{area}} <br>
                        {{fecha_nacimiento}} / {{sexo}} / {{nacionalidad}} / {{telefono}} <br>
                        {{comuna}} / {{provincia}} / {{correo}}
                        
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
      rut: 0,
      snackbar: false,
      snackbarText: "Profesor Creado",
      depto: null,
      rutRules: [
        v => !!v || 'Rut es requerido',
        v => (v && v.length <= 30) || 'Rut debe tener un largo menor de 30'
      ],
      nombres: '',
      nombreRules: [
        v => !!v || 'Nombre es requerido',
        v => (v && v.length <= 30) || 'Nombre debe tener un largo menor de 30'
      ],
      apellido_paterno: '',
      apellido_paternoRules: [
        v => !!v || 'apellido paterno es requerido',
        v => (v && v.length <= 15) || 'apellido paterno debe tener un largo menor de 15'
      ],
      apellido_materno: '',
      apellido_maternoRules: [
        v => !!v || 'apellido materno es requerido',
        v => (v && v.length <= 15) || 'apellido materno debe tener un largo menor de 15'
      ],
      
      password: '',
      passwordRules: [
        v => !!v || 'Contraseña es requerido',
        v => (v && v.length <= 255) || 'Contraseña debe tener un largo menor de 255'
      ],
      area: '',
      areaRules:
      [
        v => !!v || 'Area es requerido',
        v => (v && v.length <= 30) || 'Area debe tener un largo menor de 30 '
      ],
      fecha_nacimiento: '',
      nacionalidad: '',
      nacionalidadRules: [
        v => !!v || 'Nacionalidad es requerido',
        v => (v && v.length <= 20) || 'Nacionalidad debe tener un largo menor de 20'
      ],
      sexo: '',
      sexoRules: [
        v => !!v || 'Sexo es requerido',
        v => (v && v.length <= 2) || 'Sexo debe tener un largo menor de 2'
      ],
      telefono: '',
      telefonoRules: [
        v => !!v || 'Telefono es requerido',
        v => (v && v.length <= 12) || 'Telefono debe tener un largo menor de 12'
      ],
      region: '',
      regionRules: [
        v => !!v || 'Region es requerido',
        v => (v && v.length <= 30) || 'Region debe tener un largo menor de 30'
      ],
      provincia: '',
      provinciaRules: [
        v => !!v || 'Provincia es requerido',
        v => (v && v.length <= 30) || 'Provincia debe tener un largo menor de 30'
      ],
      comuna: '',
      comunaRules: [
        v => !!v || 'Comuna es requerido',
        v => (v && v.length <= 30) || 'Comuna debe tener un largo menor de 30'
      ],
      correo: '',
      correoRules: [
        v => !!v || 'Correo es requerido',
        v => /.+@.+/.test(v) || 'Correo debe ser tener un formato valido',
        v => (v && v.length <= 40) || 'Correo debe tener un largo menor de 40'
      ]
    }),

    methods: {
      validate () {
        if (this.$refs.form.validate()) {
          this.snackbar = true
        }
      },
      submit(){
          axios.post('http://192.168.10.10/Profesor/', {
            'rut' : this.rut,
            'nombres': this.nombres,
            'apellido_paterno' : this.apellido_paterno,
            'apellido_materno': this.apellido_materno,
            'password': this.password,
            'codigo_departamento': this.depto,
            'area': this.area,
            'fecha_nacimiento': this.fecha_nacimiento,
            'nacionalidad': this.nacionalidad,
            'sexo': this.sexo,
            'telefono': this.telefono,
            'region' : this.region,
            'provincia': this.provincia,
            'comuna': this.comuna,
            'correo' : this.correo
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