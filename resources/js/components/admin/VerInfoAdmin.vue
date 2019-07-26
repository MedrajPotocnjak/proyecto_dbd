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
                        read-only
                    ></v-text-field>
                        
                        <v-text-field
                        v-model="nombre"
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


                        <v-btn
                        :disabled="!valid"
                        color="success"
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
      fecha_nacimiento: '',
      nacionalidad: '',
      nacionalidadRules: [
        v => !!v || 'Nacionalidad es requerido',
        v => (v && v.length <= 20) || 'Nacionalidad debe tener un largo menor de 20'
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
        axios.put('http://192.168.10.10/Administrador/' + this.userid, {
            nombre: this.nombre,
            apellido_paterno: this.apellido_paterno,
            apellido_materno: this.apellido_materno,
            password: this.password,
        }).then(response => {
            this.rut=response.data.rut;
            this.nombres=response.data.nombres;
            this.apellido_paterno=response.data.apellido_paterno;
            this.apellido_materno=response.data.apellido_materno;
            this.password=response.data.password;

        });
      },
      loadInfo() {
          let url=window.location.href;
          let splitted=url.split("/administrador/");
          let userId=splitted[1];
          splitted=userId.split("/");
          userId=splitted[0];
          this.userid=userId;
          axios({
              method: 'get',
              url: 'http://192.168.10.10/Administrador/' + this.userid,
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
              this.password=response.data.password;

          });
      }
    },
    beforeMount(){
          this.loadInfo();
      },
  }
</script>
