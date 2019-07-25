<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>


                    <div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Lista Secciones del Sistema</v-toolbar-title>
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
                  <v-text-field v-model="editedItem.nombre" label="nombre"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.rut_profesor" label="rut_profesor"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.tipo" label="tipo"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.codigo_asignatura" label="codigo_asignatura"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.cupos" label="cupos"></v-text-field>
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
        <td>{{ props.item.rut_profesor }}</td>
        <td class="text-xs-right">{{ props.item.nombre }}</td>
        <td class="text-xs-right">{{ props.item.tipo }}</td>
        <td class="text-xs-right">{{ props.item.codigo_asignatura }}</td>
        <td class="text-xs-right">{{ props.item.cupos }}</td>
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
        No hay Seccions en la base de datos
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
          text: 'Nombre',
          align: 'left',
          sortable: false,
          value: 'nombre'
        },
        { text: 'Rut profesor', value: 'rut_profesor' },
        { text: 'tipo', value: 'tipo' },
        { text: 'Codigo asignatura', value: 'codigo_asignatura' },
        { text: 'Cupos', value: 'cupos' },
        { text: 'Actions', value: 'nombre', sortable: false }
      ],
      SeccionsTabla: [],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        codigo: 0,
        rut_profesor: 0,
        nombre: '',
        tipo: '',
        codigo_asignatura: 0,
        cupos: 0

      },
      defaultItem: {
        rut_profesor: 0,
        nombre: '',
        tipo: '',
        codigo_asignatura: 0,
        cupos: 0
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
            rut_profesor: 44444444,
            nombre: '159',

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
        if (confirm('¿Seguro que quieres eliminar este Seccion? (Esta accion no se puede deshacer)') && this.desserts.splice(index, 1)) {
            axios.delete('http://192.168.10.10/Seccion/'+this.editedItem.codigo, {
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
            axios.put('http://192.168.10.10/Seccion/'+this.editedItem.codigo, {
                'rut_profesor': this.editedItem.rut_profesor,
                'nombre': this.editedItem.nombre,
                'tipo': this.editedItem.tipo,
                'codigo_asignatura': this.editedItem.codigo_asignatura,
                'cupos': this.editedItem.cupos
            }).then(response => {

            });
        } else {
          this.desserts.push(this.editedItem)
            axios.post('http://192.168.10.10/Seccion/', {
                'rut_profesor': this.editedItem.rut_profesor,
                'nombre': this.editedItem.nombre,
                'tipo': this.editedItem.tipo,
                'codigo_asignatura': this.editedItem.codigo_asignatura,
                'cupos': this.editedItem.cupos
            }).then(response => {

            });
        }
        this.close()
      },
      getSeccions() {
            axios.get('http://192.168.10.10/Seccion/', {
            }).then(response => {
                this.desserts=response.data;
            });
        }
    },
    beforeMount() {
          this.getSeccions();
      },
  }
</script>