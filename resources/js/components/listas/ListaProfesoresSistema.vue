<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>


                    <div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Lista Profesores del Sistema</v-toolbar-title>
      <v-divider
        class="mx-2"
        inset
        vertical
      ></v-divider>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" max-width="500px">
        <template v-slot:activator="{ on }">
         
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">{{ formTitle }}</span>
          </v-card-title>

          <v-card-text>
            <v-container grid-list-md>
              <v-layout wrap>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.rut" label="Rut"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nombres" label="nombres"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.apellido_paterno" label="Apellido Paterno"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.apellido_materno" label="Apellido Materno"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.area" label="area"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.password" label="password"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.fecha_nacimiento" label="fecha_nacimiento"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nacionalidad" label="nacionalidad"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.codigo_departamento" label="codigo_departamento"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.sexo" label="sexo"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.telefono" label="telefono"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.region" label="region"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.provincia" label="provincia"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.comuna" label="comuna"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.correo" label="correo"></v-text-field>
                </v-flex>


              </v-layout>
            </v-container>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" flat @click="close">Cancelar</v-btn>
            <v-btn color="blue darken-1" flat @click="save">Guardar</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-toolbar>
    <v-data-table
      :headers="headers"
      :items="desserts"
      class="elevation-1"
    >
      <template v-slot:items="props">
        <td>{{ props.item.rut }}</td>
        <td class="text-xs-right">{{ props.item.nombres }}</td>
        <td class="text-xs-right">{{ props.item.apellido_paterno }}</td>
        <td class="text-xs-right">{{ props.item.apellido_materno }}</td>
        <td class="text-xs-right">{{ props.item.area }}</td>
        <td class="text-xs-right">{{ props.item.password }}</td>
        <td class="text-xs-right">{{ props.item.fecha_nacimiento }}</td>
        <td class="text-xs-right">{{ props.item.nacionalidad }}</td>
        <td class="text-xs-right">{{ props.item.codigo_departamento }}</td>
        <td class="text-xs-right">{{ props.item.sexo }}</td>
        <td class="text-xs-right">{{ props.item.telefono }}</td>
        <td class="text-xs-right">{{ props.item.region }}</td>
        <td class="text-xs-right">{{ props.item.provincia }}</td>
        <td class="text-xs-right">{{ props.item.comuna }}</td>
        <td class="text-xs-right">{{ props.item.correo }}</td>
        <td class="justify-center layout px-0">
          <v-icon
            small
            class="mr-2"
            @click="editItem(props.item)"
          >
            edit
          </v-icon>
          <v-icon
            small
            @click="deleteItem(props.item)"
          >
            delete
          </v-icon>
        </td>
      </template>
      <template v-slot:no-data>
        <br><br>
        No hay Profesors en la base de datos
        <br><br>
      </template>
    </v-data-table>
  </div>
                
                
                </v-container>
            </v-card>
        </v-flex>
  
    
  </div>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
      headers: [
        {
          text: 'Rut',
          align: 'left',
          sortable: false,
          value: 'rut'
        },
        { text: 'nombres', value: 'nombres' },
        { text: 'Apellido Paterno', value: 'apellido_paterno' },
        { text: 'Apellido Materno', value: 'apellido_materno' },
        { text: 'area', value: 'area' },
        { text: 'Password', value: 'password' },
        { text: 'Fecha nacimiento', value: 'fecha_nacimiento' },
        { text: 'Nacionalidad', value: 'nacionalidad' },
        { text: 'codigo_departamento', value: 'codigo_departamento' },
        { text: 'sexo', value: 'sexo' },
        { text: 'telefono', value: 'telefono' },
        { text: 'region', value: 'region' },
        { text: 'provincia', value: 'provincia' },
        { text: 'comuna', value: 'comuna' },
        { text: 'correo', value: 'correo' },

        { text: 'Actions', value: 'rut', sortable: false }
      ],
      ProfesorsTabla: [],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        id: 0,
        rut: 0,
        nombres: '',
        apellido_paterno: '',
        apellido_materno: '',
        area: '',
        password: '',
        fecha_nacimiento: '',
        nacionalidad: '',

        sexo: '',
        codigo_departamento: 0,
        telefono: '',
        region: '',
        provincia: '',
        comuna: '',
        correo: ''

      },
      defaultItem: {
        rut: 0,
        nombres: '',
        apellido_paterno: '',
        apellido_materno: '',
        area: '',
        password: '',
        fecha_nacimiento: '',
        nacionalidad: '',
        sexo: '',
        codigo_departamento: 0,
        telefono: '',
        region: '',
        provincia: '',
        comuna: '',
        correo: ''
      }
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
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
            rut: 44444444,
            nombres: '159',
            apellido_paterno: '6',
            apellido_materno: '24',

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
          this.editedItem = Object.assign({}, item)
        if (confirm('¿Seguro que quieres eliminar este Profesor? (Esta accion no se puede deshacer)') && this.desserts.splice(index, 1)) {
            axios.delete('http://192.168.10.10/Profesor/'+this.editedItem.id, {
            }).then(response => {

            });
        }


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
            axios.put('http://192.168.10.10/Profesor/'+this.editedItem.id, {
                'rut': this.editedItem.rut,
                'nombres': this.editedItem.nombres,
                'apellido_paterno': this.editedItem.apellido_paterno,
                'apellido_materno': this.editedItem.apellido_materno,
                'area': this.editedItem.area,
                'password': this.editedItem.password,
                'fecha_nacimiento': this.editedItem.fecha_nacimiento,
                'nacionalidad': this.editedItem.nacionalidad,
                'sexo': this.editedItem.sexo,
                'codigo_departamento': this.editedItem.codigo_departamento,
                'telefono': this.editedItem.telefono,
                'region': this.editedItem.region,
                'provincia': this.editedItem.provincia,
                'comuna': this.editedItem.comuna,
                'correo': this.editedItem.correo
            }).then(response => {

            });
        } else {
          this.desserts.push(this.editedItem)
            axios.post('http://192.168.10.10/Profesor/', {
                'rut': this.editedItem.rut,
                'nombres': this.editedItem.nombres,
                'apellido_paterno': this.editedItem.apellido_paterno,
                'apellido_materno': this.editedItem.apellido_materno,
                'area': this.editedItem.area,
                'password': this.editedItem.password,
                'fecha_nacimiento': this.editedItem.fecha_nacimiento,
                'nacionalidad': this.editedItem.nacionalidad,
                'sexo': this.editedItem.sexo,
                'codigo_departamento': this.editedItem.codigo_departamento,
                'telefono': this.editedItem.telefono,
                'region': this.editedItem.region,
                'provincia': this.editedItem.provincia,
                'comuna': this.editedItem.comuna,
                'correo': this.editedItem.correo
            }).then(response => {

            });
        }
        this.close()
      },
      getProfesors() {
            axios.get('http://192.168.10.10/Profesor/', {
            }).then(response => {
                this.desserts=response.data;
            });
        }
    },
    beforeMount() {
          this.getProfesors();
      },
  }
</script>