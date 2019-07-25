<template>
  <div>
    <v-toolbar flat color="white" class="xs12  sm8 offset-sm1">
      <v-toolbar-title>Horario    </v-toolbar-title>
        <v-overflow-btn
            class="my-2"
            :items="secciones"
            item-text="nombre"
            item-value="codigo"
            label="Secciones"
            v-model="seccion"
            target="#dropdown-example-1"
            @change="buscarHorario"
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
          <v-btn color="primary" dark class="mb-2" v-on="on">Crear Horario</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">{{ formTitle }}</span>
          </v-card-title>

          <v-card-text>
              {{seccion}}|{{editedItem.bloque}}|{{sala }}|
            <v-container grid-list-md>
              <v-layout wrap>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.bloque" label="Bloque"></v-text-field>
                </v-flex>
                  <v-overflow-btn
                      class="my-2"
                      :items="salas"
                      item-text="nombre"
                      item-value="codigo"
                      label="Sala"
                      v-model="sala"
                      target="#dropdown-example-1"
                      required
                  ></v-overflow-btn>
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
        <td class="text-xs-left">{{ props.item.bloque }}</td>
        <td class="text-xs-left">{{ props.item.sala }}</td>
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
        No hay bloques para esta sección.
      </template>
    </v-data-table>
  </div>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
        asignatura: 0,
        secciones:null,
        seccion: 0,
        salas: [],
        sala: 0,
      headers: [
        {
          text: 'Bloque',
          align: 'left',
          sortable: false,
          value: 'bloque'
        },
        { text: 'Sala', value: 'sala' },
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
          this.sala=this.editedItem.codigo_sala
      },

      deleteItem (item) {
        const index = this.desserts.indexOf(item)
          this.editedItem = Object.assign({}, item)
        if (confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)) {
            axios.delete('http://192.168.10.10/Seccion_Sala/'+this.editedItem.id, {
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
            axios.put('http://192.168.10.10/Seccion_Sala/'+this.editedItem.id, {
                'bloque': this.editedItem.bloque,
                'codigo_sala' : this.sala
            }).then(response => {

            });
        } else {
          this.desserts.push(this.editedItem)
            axios.post('http://192.168.10.10/Seccion_Sala/', {
                'bloque': this.editedItem.bloque,
                'codigo_sala' : this.sala,
                'codigo_seccion': this.seccion
            }).then(response => {

            });
            this.buscarHorario();
        }
        this.close()
      },
      getAsignatura() {
            axios.get('http://192.168.10.10/Seccion/', {
            }).then(response => {
                this.secciones=response.data;
            });
        },
        getSalas() {
            axios.get('http://192.168.10.10/Sala/', {
            }).then(response => {
                this.salas=response.data;
            });
        },
       buscarHorario () {
            axios.get('http://192.168.10.10/Seccion/getSalaSeccion/'+ this.seccion, {
            }).then(response => {
                this.desserts=response.data;
            });
        }
    },
    beforeMount() {
          this.getAsignatura();
          this.getSalas();
      },
  }
</script>
