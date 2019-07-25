<template>
  <v-container fluid grid-list-sm>
    <v-layout row wrap>
      <v-flex d-flex xs12 order-xs5>
        <v-layout column>
          <v-flex d-flex>
            <v-card color="light-blue lighten-4" tile>

 <v-toolbar dark color="primary">
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title class="white--text">Ramos inscritos {{userid}}</v-toolbar-title>
    <v-spacer></v-spacer> </v-toolbar>
              <v-card-text>
                

                
<v-data-table
      :headers="headers"
      :items="desserts"
      class="elevation-1"
    >
      <template v-slot:items="props">
        <td>{{ props.item.nombre }}</td>
        <td class="text-xs-right">{{ props.item.calories }}</td>
        <td class="justify-right layout px-0">
          
          <v-icon
            small
            @click="deleteItem(props.item)"
          >
            delete
          </v-icon>
        </td>
      </template>
      
    </v-data-table>






              </v-card-text>
            </v-card>
          </v-flex>
          
        </v-layout>
      </v-flex>
      <v-flex d-flex xs12 sm4>
        <v-layout row wrap>
          <v-flex d-flex>
            <v-card color="light-blue lighten-4" tile flat>
                     <v-toolbar dark color="primary">
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title class="white--text">Ramos disponibles</v-toolbar-title>
    <v-spacer></v-spacer> </v-toolbar>

              <v-card-text> 
                <center>
                <v-flex xs12 sm9 d-flex align-center>
                  
                  <v-overflow-btn
                        class="my-2"
                        :items="ramos"
                        item-text="nombre"
                        item-value="codigo"
                        label="Asignaturas Disponibles"
                        v-model="asignatura"
                        target="#dropdown-example-1"
                        @change="buscarSeccion"
                        required
                        ></v-overflow-btn>
                 
                </v-flex>

              
              </center>
              </v-card-text>
            </v-card>
          </v-flex>

          <v-flex d-flex>
            <v-card color="light-blue lighten-4" tile flat>
                     <v-toolbar dark color="primary">
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title class="white--text">Recomendacion Horario</v-toolbar-title>
    <v-spacer></v-spacer> </v-toolbar>

              <v-card-text>  
              <center>
                <v-flex xs12 sm9 d-flex align-center>
                  <v-select
                    :items="horarius"
                    label="Horarios Sugeridos"
                    outline
                  ></v-select>
                </v-flex>

               <v-btn outline color="indigo" @click="tomarRamo">Tomar horario sugerido</v-btn>

              </center>

              </v-card-text>
            </v-card>
          </v-flex>

          
          
        </v-layout>
      </v-flex>


      
      <v-flex d-flex xs12 sm4 child-flex>
        <v-card color="light-blue lighten-4" tile flat>

 <v-toolbar dark color="primary">
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title class="white--text">Secciones</v-toolbar-title>
    <v-spacer></v-spacer> </v-toolbar>


          <v-card-text>
            

            <center>
                <v-overflow-btn
                        class="my-3"
                        :items="secciones"
                        item-text="nombre"
                        item-value="codigo"
                        label="Secciones"
                        v-model="seccion"
                        target="#dropdown-example-2"
                        @change="getHorarioSeccion"
                        required
                        ></v-overflow-btn>

                <br>
                
                Bloques afectados: {{ horarios }}

                <br>

                <v-btn outline color="indigo" @click="tomarRamo">Tomar Ramo</v-btn>
              </center>

          </v-card-text>
        </v-card>
      </v-flex>
      <v-flex d-flex xs12 sm4>
        <v-card color="light-blue lighten-4" tile flat>
            <v-toolbar dark color="primary">
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title class="white--text">Vista Horario</v-toolbar-title>
    <v-spacer></v-spacer> </v-toolbar>
          <v-card-text>
              
          Esta seccion son tiene ocupados los horarios:

              
          </v-card-text>
        </v-card>

        
      </v-flex>
    </v-layout>

    <v-snackbar
                v-model="snackbar"
                :bottom=true
                :timeout=4000
                :vertical="mode === 'vertical'"
            >
                {{snackbarText}}
            </v-snackbar>

  </v-container>
</template>


<script>
  export default {
    data: () => ({
      asignatura: null,
      seccion: null,
      snackbar: false,
      snackbarText: "Asignatura Inscrita",
      horarios: '',
      lorem: `Lorem ipsum dolor sit amet, mel at clita quando. Te sit oratio vituperatoribus, nam ad ipsum posidonium mediocritatem,
       explicari dissentiunt cu mea. Repudiare disputationi vim in, mollis iriure nec cu, alienum argumentum ius ad. Pri eu justo aeque torquatos.`,
ramos: ['Fundamentos de Ingenieria de software',
        'Diseño de base de datos',
         'Ingenieria y Sociedad',
          'Calculo III'],
          secciones: ['A1',
        'B3',
         'E4',
          'B4'],
          horarius: ['Solo ramos del nivel',
        'Concentrado en la mañana',
         'Concelntrado en la tarde',
          'Ramos clave']
      ,dialog: false,
      headers: [
        {
          text: 'Nombre Ramo',
          align: 'left',
          sortable: false,
          value: 'nombre'
        }
      ],
      desserts: [],
        userid: '',
      editedIndex: -1,
      editedItem: {
        nombre: '',
        seccion: '',
      },
      defaultItem: {
        nombre: '',
        seccion: '',
      }
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Nuevo' : 'Editar nombre Asignatura'
      }
    },

    watch: {
      dialog (val) {
        val || this.close()
      }
    },

    created () {
      this.initialize()
    },

    methods: {
      initialize () {
        this.desserts = [
          {
            id: 1,
            nombre: 'Calculo II'
          },
          {
            id: 2,
            nombre: 'Analisis de cosas'
          },
          {
            id: 3,
            nombre: 'Estadisticas para Humanistas'
          }
          
        ]
      },

      editItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        const index = this.desserts.indexOf(item)
        confirm('Desinscribir ramo?') && this.desserts.splice(index, 1)
      },

      close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },

      save () {
        if (this.editedIndex > -1) {
          Object.assign(this.desserts[this.editedIndex], this.editedItem)
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      },
        getUserName:function() {
            let url = window.location.href;
            let splitted = url.split("/alumno/");
            let userId = splitted[1];
            splitted = userId.split("/");
            userId = splitted[0];
            this.userid = userId;
        },

      getAsignaturas () {
        axios.get('http://192.168.10.10/Alumno/getPosibleAsignatura/'+ this.userid, {
          }).then(response => {
            this.ramos=response.data;
          });
      },
      buscarSeccion () {
        axios.get('http://192.168.10.10/Asignatura/getSecciones/'+ this.asignatura, {
          }).then(response => {
            this.secciones=response.data;
          });
      },
      getHorarioSeccion () {
        axios.get('http://192.168.10.10/Seccion/getHorarios/'+ this.seccion, {
          }).then(response => {
            this.horarios=response.data;
          });
      },
      tomarRamo () {
          axios.post('http://192.168.10.10/Alumno/inscribirAsignatura/'+ this.userid, {
            "asignatura": this.asignatura,
            "seccion": this.seccion
          }).then(response => {

          });
          this.snackbar=true;
      }



    },
      beforeMount(){
          this.getUserName();
          this.getAsignaturas();
      },
  }
</script>
