<template>
  <div>
    <v-toolbar flat color="white" class="xs12  sm8 offset-sm1">
      <v-toolbar-title>Secciones    </v-toolbar-title>
        <v-overflow-btn
            class="my-2"
            :items="secciones"
            item-text="nombre"
            item-value="codigo"
            label="Seccion"
            v-model="seccion"
            target="#dropdown-example-1"
            @change="buscarAlumnos"
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
                  <v-text-field v-model="editedItem.nota_p1" label="PEP 1"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nota_p2" label="PEP 2"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nota_p3" label="PEP 3"></v-text-field>
                </v-flex>
                  <v-flex xs12 sm6 md4>
                      <v-text-field v-model="editedItem.nota_c1" label="Control 1"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                      <v-text-field v-model="editedItem.nota_c2" label="Control 2"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                      <v-text-field v-model="editedItem.nota_c3" label="Control 3"></v-text-field>
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
        <td class="text-xs-left">{{ props.item.rut }}</td>
        <td class="text-xs-left">{{ props.item.promedio }}</td>
        <td class="text-xs-left">{{ props.item.nota_p1 }}</td>
        <td class="text-xs-left">{{ props.item.nota_p2 }}</td>
        <td class="text-xs-left">{{ props.item.nota_p3 }}</td>
          <td class="text-xs-left">{{ props.item.nota_c1 }}</td>
          <td class="text-xs-left">{{ props.item.nota_c2 }}</td>
          <td class="text-xs-left">{{ props.item.nota_c3 }}</td>
          <td class="text-xs-left">{{ props.item.nota_c3 }}</td>
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
        No hay alumnos.
      </template>
    </v-data-table>
  </div>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
        seccion: 0,
        secciones:null,
      headers: [
        {
          text: 'Rut Alumno',
          align: 'left',
          sortable: false,
          value: 'rut'
        },
        { text: 'Promedio', value: 'promedio' },
        { text: 'Pep 1', value: 'nota_p1' },
        { text: 'Pep 2', value: 'nota_p2' },
        { text: 'Pep 3', value: 'nota_p3' },
          { text: 'Control 1', value: 'nota_c1' },
          { text: 'Control 2', value: 'nota_c2' },
          { text: 'Control 3', value: 'nota_c3' },

        { text: 'Action', value: 'rut_profesor', sortable: false }
      ],
      desserts: [],
      editedIndex: -1,
        userid:0,
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
          this.editedItem = Object.assign({}, item)
        if (confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)) {
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
            axios.put('http://192.168.10.10/Seccion_Alumno/'+this.editedItem.codigo, {
                'nota_p1': this.editedItem.nota_p1,
                'nota_p2': this.editedItem.nota_p2,
                'nota_p3': this.editedItem.nota_p3,
                'nota_c1': this.editedItem.nota_c1,
                'nota_c2': this.editedItem.nota_c2,
                'nota_c3': this.editedItem.nota_c3
                'promedio':
            }).then(response => {

            });
        } else {
          this.desserts.push(this.editedItem)
            axios.post('http://192.168.10.10/Seccion_Alumno/', {
                'nota_p1': this.editedItem.nota_p1,
                'nota_p2': this.editedItem.nota_p2,
                'nota_p3': this.editedItem.nota_p3,
                'nota_c1': this.editedItem.nota_c1,
                'nota_c2': this.editedItem.nota_c2,
                'nota_c3': this.editedItem.nota_c3,
            }).then(response => {

            });
        }
        this.close()
      },
      getSecciones() {
              let url=window.location.href;
              let splitted=url.split("/profesor/");
              let userId=splitted[1];
              splitted=userId.split("/");
              userId=splitted[0];
              this.userid=userId;
            axios.get('http://192.168.10.10/Profesor/obtenerSecciones/'+this.userid, {
            }).then(response => {
                this.secciones=response.data;
            });
        },
       buscarAlumnos () {
            axios.get('http://192.168.10.10/Seccion/obtenerAlumnosVista/'+ this.seccion, {
            }).then(response => {
                this.desserts=response.data;
            });
        }
    },
    beforeMount() {
          this.getSecciones();
      },
  }
</script>
