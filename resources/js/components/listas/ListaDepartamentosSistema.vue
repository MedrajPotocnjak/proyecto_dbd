<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>


                    <div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Lista Departamentos del Sistema</v-toolbar-title>
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
                  <v-text-field v-model="editedItem.rut_coordinador" label="rut_coordinador"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nombre" label="nombre"></v-text-field>
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
      :items="departamentos"
      class="elevation-1"
    >
      <template v-slot:items="props">
        <td>{{ props.item.rut_coordinador }}</td>
        <td class="text-xs-right">{{ props.item.nombre }}</td>
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
        No hay Departamentos en la base de datos
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
          text: 'Rut Coordinador',
          align: 'left',
          sortable: false,
          value: 'rut_coordinador'
        },
        { text: 'nombre', value: 'nombre' },
        { text: '', value: '' },

        { text: 'Actions', value: 'rut_coordinador', sortable: false }
      ],
      DepartamentosTabla: [],
      departamentos: [],
      editedIndex: -1,
      editedItem: {
        codigo: 0,
        rut_coordinador: 0,
        nombre: '',
      },
      defaultItem: {
        rut_coordinador: 0,
        nombre: '',
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
        this.departamentos = [
          {
            rut_coordinador: 44444444,
            nombre: '159',

          }
        ]
      },
      editItem (item) {
        this.editedIndex = this.departamentos.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        const index = this.departamentos.indexOf(item)
          this.editedItem = Object.assign({}, item)
        if (confirm('¿Seguro que quieres eliminar este Departamento? (Esta accion no se puede deshacer)') && this.departamentos.splice(index, 1)) {
            axios.delete('http://192.168.10.10/Departamento/'+this.editedItem.codigo, {
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
          Object.assign(this.departamentos[this.editedIndex], this.editedItem)
            axios.put('http://192.168.10.10/Departamento/'+this.editedItem.codigo, {
                'rut_coordinador': this.editedItem.rut_coordinador,
                'nombre': this.editedItem.nombre
            }).then(response => {

            });
        } else {
          this.departamentos.push(this.editedItem)
            axios.post('http://192.168.10.10/Departamento/', {
                'rut_coordinador': this.editedItem.rut_coordinador,
                'nombre': this.editedItem.nombre
            }).then(response => {

            });
        }
        this.close()
      },
      getDepartamentos() {
            axios.get('http://192.168.10.10/Departamento/', {
            }).then(response => {
                this.departamentos=response.data;
            });
        }
    },
    beforeMount() {
          this.getDepartamentos();
      },
  }
</script>