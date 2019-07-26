<template>
  <div>
      <v-dialog
        v-model="dialog"
        width="500"
      >
        <template v-slot:activator="{ on }">
          <v-toolbar color="primary">
          <v-btn
            color="white"
            flat
            dark
            v-on="on"
          >
            Información de Pago
          </v-btn>
            </v-toolbar>
        </template>
  
        <v-card>
          <v-card-title
            class="headline primary"
            primary-title 
          >
            Información de Pago
          </v-card-title>
            
          <v-card-text>
            <v-text-field v-model="targeta_credito" mask="####-####-####-####" label="Número de Targeta"></v-text-field>
            <v-text-field v-model="cvc" mask="###" label="Últimos 3 dígitos"></v-text-field>
            <v-text-field v-model="fecha_caducidad" mask="##/##" label="Fecha expiración"></v-text-field>
          </v-card-text>
  
          <v-divider></v-divider>
          
          
  
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              color="primary"
              flat
              @click="forget"
            >
              Olvidar 
            </v-btn>
            <v-btn
              color="primary"
              flat
              @click="guardar"
            >
              Guardar
            </v-btn>
            
          </v-card-actions>
        </v-card>
      </v-dialog>
      <v-dialog v-model="dialoge" max-width="500px">
          <v-card>
            <v-card-title>
              <span class="headline">Metodo de Pago</span>
            </v-card-title>
  
            <v-card-text>
              <v-container grid-list-md>
                <v-layout wrap>
                  <v-container fluid>
                     <div v-if="flagTarjeta">
                      <v-card-text>
                        <p class="text-xs-center"> Número de Tarjeta = {{targeta_credito}}</p>
                        <p class="text-xs-center"> Últimos 3 digitos = {{cvc}}</p>
                        <p class="text-xs-center"> Fecha expiración = {{fecha_caducidad}}</p>
                      </v-card-text>
                     </div>
                     <div v-else>
                        <v-card-text>
                          <v-text-field v-model="targeta_credito" mask="####-####-####-####" label="Número de Targeta"></v-text-field>
                          <v-text-field v-model="cvc" mask="###" label="Últimos 3 dígitos"></v-text-field>
                          <v-text-field v-model="fecha_caducidad" mask="##/##" label="Fecha expiración"></v-text-field>
                        </v-card-text>
                     </div>
                      
                  </v-container>
                </v-layout>
              </v-container>
            </v-card-text>
  
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" flat @click="cancelar">Cancelar</v-btn>
              <v-btn color="blue darken-1" flat @click="pagarMatricula">Pagar</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      <v-expansion-panel dark>
         <v-expansion-panel-content v-bind:class="dark">
            <div slot="header">Pago Matricula</div>
              <p class="text-xs-center"> Total = {{valorMatri}}</p>
              
           <div class="my-2">
                <v-btn depressed color="primary" @click="pagar">Pagar</v-btn>
              </div>
         </v-expansion-panel-content>
      </v-expansion-panel>
      <v-divider></v-divider>
      <v-expansion-panel dark>
         <v-expansion-panel-content v-bind:class="dark">
            <div slot="header">Pago Mensualidad</div>
              <p class="text-xs-center">Total = ${{valorMensual}}-.</p>
              
              !! {{ datosAlumno }} !! {{userid}}
              <br>
              {{targeta_credito}}:::{{fecha_caducidad}}:::{{cvcGuardado}}
              <br>
              <div v-if="estado_matricula">
                Matricula pagada
                <div class="my-2">
                  <v-btn depressed color="primary" @click="pagar">Pagar</v-btn>
                </div>
              </div>
              <div v-else class="text-xs-center">
                NO SE HA PAGADO LA MATRICULA
                
              </div>
              
         </v-expansion-panel-content>
      </v-expansion-panel>
    </div>
</template>

<script>
  export default {
    data () {
      return {
        forma_pago: '1',
        targeta_credito: '',
        fecha_caducidad: '',
        cvcGuardado: '',
        matricula: 'm',
        dialog: false,
        dialoge: false,
        userid: '',
        datosAlumno: '',
        tarjeta:'',
        cvc:'',
        fecha:'',
        estado_matricula:false,
        valorMatri: 90000,
        valorMensual: 4444+2,
        flagTarjeta: false,
      }
    },
    methods: {
      forget() {
        this.targeta_credito='0';
        this.cvc='0';
        this.fecha_caducidad='0';
      },
      pagar () {
        
        this.dialoge = true
      },
      getUserName:function() {
            let url = window.location.href;
            let splitted = url.split("/alumno/");
            let userId = splitted[1];
            splitted = userId.split("/");
            userId = splitted[0];
            this.userid = userId;
      },
      getDatosAlumno(){
        axios.get('http://192.168.10.10/Alumno/'+ this.userid, {
          }).then(response => {
            this.targeta_credito=response.data.targeta_credito;
            this.fecha_caducidad=response.data.fecha_caducidad;
            this.cvc=response.data.cvc;
          });
      },
      guardar () {
        axios.put('http://192.168.10.10/Alumno/' + this.userid, {
            'targeta_credito': this.targeta_credito,
            'fecha_caducidad': this.fecha_caducidad,
            'cvc': this.cvc
            }).then(response => {
            
        });

        this.flagTarjeta = true,


        this.dialog = false
      },
      cancelar () {
        
        this.dialoge = false
      },
      pagarMatricula () {
        axios.post('http://192.168.10.10/Pago/addPago/' + this.userid, {
                'tipo_pago': this.matricula,
                'forma_pago': this.forma_pago,
                'costo': this.valorMatri
            }).then(response => {

            });
        this.dialoge = false
      },
    },
      beforeMount(){
          this.getUserName();
          this.getDatosAlumno();

      },
  }
</script>
