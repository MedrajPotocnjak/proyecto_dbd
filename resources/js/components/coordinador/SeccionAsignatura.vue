<template>
  <div>
    <v-toolbar flat color="white" class="xs12  sm8 offset-sm1">
      <v-toolbar-title>Secciones    </v-toolbar-title>
        <v-overflow-btn
            class="my-2"
            :items="asignaturas"
            item-text="nombre"
            item-value="codigo"
            label="Asignatura"
            v-model="asignatura"
            target="#dropdown-example-1"
            @change="buscarSeccion"
            required
        ></v-overflow-btn>
      <v-divider
        class="mx-2"
        inset
        vertical
      ></v-divider>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" max-width="500px">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on">Crear seccion</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">{{ formTitle }}</span>
          </v-card-title>

          <v-card-text>
              {{editedItem.codigo}}|{{editedItem.cupos}}|{{editedItem.nombre }}|
            <v-container grid-list-md>
              <v-layout wrap>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.rut_profesor" label="Rut profesor"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nombre" label="nombre"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.tipo" label="tipo"></v-text-field>
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
        <td class="text-xs-left">{{ props.item.nombre }}</td>
        <td class="text-xs-left">{{ props.item.tipo }}</td>
        <td class="text-xs-left">{{ props.item.cupos }}</td>
        <td class="text-xs-left">{{ props.item.rut_profesor }}</td>
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
        No hay secciones.
      </template>
    </v-data-table>
  </div>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
        asignatura: 0,
        asignaturas: null,
        secciones:null,
      headers: [
        {
          text: 'Nombre Seccion',
          align: 'left',
          sortable: false,
          value: 'nombre_seccion'
        },
        { text: 'Tipo', value: 'tipo' },
        { text: 'Cupos', value: 'cupos' },
        { text: 'Rut Profesor', value: 'rut_profesor' },
        { text: 'Action', value: 'rut_profesor', sortable: false }
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        rut_profesor: 0,
        nombre: '',
        tipo: 0,
        cupos: 0,
        codigo: 0,
      },
      defaultItem: {
        rut_profesor: 0,
        nombre: '',
        tipo: 0,
        horario: 0,
      }
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Nueva Seccion' : 'Editar'
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
        this.asignaturas = [
          {
            rut_profesor: 99999999,
            nombre: '159',
            tipo: 'l',
            cupos: 30,
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
        confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
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
                'nombre': this.editedItem.nombre,
                'rut_profesor' : this.editedItem.rut_profesor,
                'tipo' : this.editedItem.tipo,
                'cupos' : this.editedItem.cupos,
            }).then(response => {

            });
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      },
      getAsignatura() {
            axios.get('http://192.168.10.10/Asignatura/', {
            }).then(response => {
                this.asignaturas=response.data;
            });
        },
       buscarSeccion () {
            axios.get('http://192.168.10.10/Asignatura/getSecciones/'+ this.asignatura, {
            }).then(response => {
                this.desserts=response.data;
            });
        }
    },
    beforeMount() {
          this.getAsignatura();
      },
  }
</script>
