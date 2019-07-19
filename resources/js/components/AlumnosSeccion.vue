<template>
  <div>
    <v-toolbar flat color="white" class="xs12  sm8 offset-sm1">
      <v-toolbar-title>Alumnos seccion</v-toolbar-title>
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
                  <v-text-field v-model="editedItem.rut_alumno" label="Rut alumno"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nombre" label="nombre"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.apellido_paterno" label="Apellido paterno"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.apellido_materno" label="Apellido materno"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nota_c1" label="nota_c1"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nota_c2" label="nota_c2"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nota_c3" label="nota_c3"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nota_p1" label="nota_p1"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nota_p2" label="nota_p2"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nota_p3" label="nota_p3"></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.promedio" label="promedio"></v-text-field>
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
        <td>{{ props.item.rut_alumno }}</td>
        <td class="text-xs-left">{{ props.item.nombre }}</td>
        <td class="text-xs-left">{{ props.item.apellido_paterno }}</td>
        <td class="text-xs-left">{{ props.item.apellido_materno }}</td>
        <td class="text-xs-left">{{ props.item.nota_c1 }}</td>
        <td class="text-xs-left">{{ props.item.nota_c2 }}</td>
        <td class="text-xs-left">{{ props.item.nota_c3 }}</td>
        <td class="text-xs-left">{{ props.item.nota_p1 }}</td>
        <td class="text-xs-left">{{ props.item.nota_p2 }}</td>
        <td class="text-xs-left">{{ props.item.nota_p3 }}</td>
        <td class="text-xs-left">{{ props.item.promedio }}</td>
        <td class="justify-center layout px-0">
          <v-icon
            small
            class="mr-2"
            @click="editItem(props.item)"
          >
            edit
          </v-icon>
        </td>
      </template>
      <template v-slot:no-data>
        <v-btn color="primary" @click="initialize">Reset</v-btn>
      </template>
    </v-data-table>
  </div>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
      headers: [
        {
          text: 'Rut Alumno',
          align: 'left',
          sortable: false,
          value: 'rut_alumno'
        },
        { text: 'Nombre', value: 'nombre' },
        { text: 'Apellido_paterno', value: 'apellido_paterno' },
        { text: 'Apellido_materno', value: 'apellido_materno' },
        { text: 'Control 1', value: 'nota_c1' },
        { text: 'Control 2', value: 'nota_c3' },
        { text: 'Control 3', value: 'nota_c1' },
        { text: 'Pep 1', value: 'nota_p1' },
        { text: 'Pep 2', value: 'nota_p2' },
        { text: 'Pep 3', value: 'nota_p3' },
        { text: 'Promedio', value: 'promedio' },
        { text: 'Actions', value: 'rut_alumno', sortable: false }
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        rut_alumno: 0,
        nombre: '',
        apellido_paterno: '',
        apellido_materno: '',
        nota_c1: 0,
        nota_c2: 0,
        nota_c3: 0,
        nota_p1: 0,
        nota_p2: 0,
        nota_p3: 0,
        promedio: 0,
      },
      defaultItem: {
        rut_alumno: 0,
        nombre: '',
        apellido_paterno: '',
        apellido_materno: '',
        nota_c1: 0,
        nota_c2: 0,
        nota_c3: 0,
        nota_p1: 0,
        nota_p2: 0,
        nota_p3: 0,
        promedio: 0,
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
        this.desserts = [
          {
            rut_alumno: 12395748,
            nombre: 'Pepe',
            apellido_paterno: 'Ape',
            apellido_materno: 'llido',
            nota_c1: 1.8,
            nota_c2: 6.5,
            nota_c3: 4.1,
            nota_p1: 2.5,
            nota_p2: 5.5,
            nota_p3: 7.0,
            promedio: 4.9,
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
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      }
    }
  }
</script>