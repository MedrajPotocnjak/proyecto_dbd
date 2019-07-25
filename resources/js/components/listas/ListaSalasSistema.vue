<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>


                    <div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Lista Salaes del Sistema</v-toolbar-title>
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
                  <v-text-field v-model="editedItem.ubicacion" label="ubicacion"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.cantidad_puestos" label="cantidad_puestos"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.cantidad_computadores" label="cantidad_computadores"></v-text-field>
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
        <td class="text-xs-right">{{ props.item.nombre }}</td>
        <td class="text-xs-right">{{ props.item.ubicacion }}</td>
        <td class="text-xs-right">{{ props.item.cantidad_puestos }}</td>
        <td class="text-xs-right">{{ props.item.cantidad_computadores }}</td>
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
        No hay Salas en la base de datos
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
        { text: 'Ubicacion', value: 'ubicacion' },
        { text: 'Puestos', value: 'cantidad_puestos' },
        { text: 'Computadores', value: 'cantidad_computadores' },
        { text: 'Actions', value: 'nombre', sortable: false }
      ],
      SalasTabla: [],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        codigo: 0,
        nombre: '',
        ubicacion: '',
        cantidad_puestos: 0,
        cantidad_computadores: 0

      },
      defaultItem: {
        nombre: '',
        ubicacion: '',
        cantidad_puestos: 0,
        cantidad_computadores: 0
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
        if (confirm('¿Seguro que quieres eliminar este Sala? (Esta accion no se puede deshacer)') && this.desserts.splice(index, 1)) {
            axios.delete('http://192.168.10.10/Sala/'+this.editedItem.codigo, {
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
            axios.put('http://192.168.10.10/Sala/'+this.editedItem.codigo, {
                'nombre': this.editedItem.nombre,
                'ubicacion': this.editedItem.ubicacion,
                'cantidad_puestos': this.editedItem.cantidad_puestos,
                'cantidad_computadores': this.editedItem.cantidad_computadores
            }).then(response => {

            });
        } else {
          this.desserts.push(this.editedItem)
            axios.post('http://192.168.10.10/Sala/', {
                'nombre': this.editedItem.nombre,
                'ubicacion': this.editedItem.ubicacion,
                'cantidad_puestos': this.editedItem.cantidad_puestos,
                'cantidad_computadores': this.editedItem.cantidad_computadores
            }).then(response => {

            });
        }
        this.close()
      },
      getSalas() {
            axios.get('http://192.168.10.10/Sala/', {
            }).then(response => {
                this.desserts=response.data;
            });
        }
    },
    beforeMount() {
          this.getSalas();
      },
  }
</script>