<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>
                    <h2>Información Personal</h2>
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
                        readonly
                        ></v-text-field>
                        
                        <v-text-field
                        v-model="nombre"
                        :counter="30"
                        :rules="nombreRules"
                        label="Nombre"
                        required
                        readonly
                        ></v-text-field>

                        <v-text-field
                        v-model="apellido_paterno"
                        :counter="15"
                        :rules="apellido_paternoRules"
                        label="Apellido paterno"
                        required
                        readonly
                        ></v-text-field>

                        <v-text-field
                        v-model="apellido_materno"
                        :counter="15"
                        :rules="apellido_maternoRules"
                        label="Apellido materno"
                        readonly
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="nivel"
                        label="Nivel"
                        type="number"
                        min="1"
                        max="12"
                        required
                        readonly
                        ></v-text-field>

                        <v-text-field
                        v-model="ingreso"
                        :counter="6"
                        :rules="ingresoRules"
                        label="Ingreso"
                        mask="#/####"
                        return-masked-value="true"
                        required
                        readonly
                        ></v-text-field>

                        <v-text-field
                        v-model="password"
                        :counter="255"
                        :rules="passwordRules"
                        label="Contraseña"
                        
                        required
                        ></v-text-field>
                        <v-text-field
                        v-model="fecha_nacimiento"
                        :counter="10"
                        :rules="fecha_nacimientoRules"
                        label="Fecha nacimiento (En formato: DD/MM/AAAA)"
                        mask="##/##/####"
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
                        v-model="estado_civil"
                        :counter="12"
                        :rules="estado_civilRules"
                        label="Estado civil"
                        
                        required
                        ></v-text-field>
                        <v-text-field
                        v-model="sexo"
                        :counter="1"
                        label="Sexo"
                        readonly
                        required
                        ></v-text-field>

                        <v-text-field
                        v-model="telefono"
                        :counter="12"
                        :rules="telefonoRules"
                        label="Telefono"

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
                        color="primary"
                        @click="submit"
                        >
                        Actualizar Datos
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
      nivel: '',
      ingreso: '',
      ingresoRules: [
        v => !!v || 'ingreso es requerido',
        v => (v && v.length <= 7) || 'ingreso debe tener un largo menor de 7'
      ],
      password: '',
      passwordRules: [
        v => !!v || 'Contraseña es requerido',
        v => (v && v.length <= 255) || 'Contraseña debe tener un largo menor de 255'
      ],
      asignaturas_aprobadas: '',
      nas: '',
      ppa: '',
      nar: '',
      fecha_nacimiento: '',
      nacionalidad: '',
      nacionalidadRules: [
        v => !!v || 'Nacionalidad es requerido',
        v => (v && v.length <= 20) || 'Nacionalidad debe tener un largo menor de 20'
      ],
      estado_civil: '',
      estado_civilRules: [
        v => !!v || 'Estado civil es requerido',
        v => (v && v.length <= 12) || 'Estado civil debe tener un largo menor de 12'
      ],
      sexo: '',
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
        axios.put('http://192.168.10.10/Alumno/' + this.userid, {
            nacionalidad: this.nacionalidad,
            correo: this.correo,
            comuna: this.comuna,
            provincia: this.provincia,
            telefono: this.telefono,
            region: this.region,
            estado_civil: this.estado_civil,
        }).then(response => {
            this.rut=response.data.rut;
            this.nombre=response.data.nombre;
            this.apellido_paterno=response.data.apellido_paterno;
            this.apellido_materno=response.data.apellido_materno;
            this.nivel=response.data.nivel;
            this.password=response.data.password;
            this.ingreso=response.data.ingreso;
            this.fecha_nacimiento=response.data.fecha_nacimiento;
            this.nacionalidad=response.data.nacionalidad;
            this.correo=response.data.correo;
            this.comuna=response.data.comuna;
            this.provincia=response.data.provincia;
            this.telefono=response.data.telefono;
            this.estado_civil=response.data.estado_civil;
            this.region=response.data.region;
            this.sexo=response.data.sexo;
        });
      },
      loadInfo() {
          let url=window.location.href;
          let splitted=url.split("/alumno/");
          let userId=splitted[1];
          splitted=userId.split("/");
          userId=splitted[0];
          this.userid=userId;
          axios({
              method: 'get',
              url: 'http://192.168.10.10/Alumno/' + this.userid,
              headers: {

              },
              validateStatus: (status) => {
                  return true; // I'm always returning true, you may want to do it depending on the status received
              }
          }).then(response => {
              this.rut=response.data.rut;
              this.nombre=response.data.nombre;
              this.apellido_paterno=response.data.apellido_paterno;
              this.apellido_materno=response.data.apellido_materno;
              this.nivel=response.data.nivel;
              this.password=response.data.password;
              this.ingreso=response.data.ingreso;
              this.fecha_nacimiento=response.data.fecha_nacimiento;
              this.nacionalidad=response.data.nacionalidad;
              this.correo=response.data.correo;
              this.comuna=response.data.comuna;
              this.provincia=response.data.provincia;
              this.telefono=response.data.telefono;
              this.estado_civil=response.data.estado_civil;
              this.region=response.data.region;
              this.sexo=response.data.sexo;
          });
      }
    },
    beforeMount(){
          this.loadInfo();
      },
  }
</script>
