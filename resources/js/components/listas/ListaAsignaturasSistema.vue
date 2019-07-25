<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>


                    <div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Lista Asignaturas del Sistema</v-toolbar-title>
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
                  <v-text-field v-model="editedItem.asistencia_minima" label="asistencia_minima"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.ponderacion" label="ponderacion"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.nivel" label="nivel"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.horas_teoria" label="horas_teoria"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.horas_laboratorio" label="horas_laboratorio"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.horas_ejercicios" label="horas_ejercicios"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field v-model="editedItem.version_plan_estudios" label="version_plan_estudios"></v-text-field>
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
        <td>{{ props.item.asistencia_minima }}</td>
        <td class="text-xs-right">{{ props.item.nombre }}</td>
        <td class="text-xs-right">{{ props.item.ponderacion }}</td>
        <td class="text-xs-right">{{ props.item.nivel }}</td>
        <td class="text-xs-right">{{ props.item.horas_teoria }}</td>
        <td class="text-xs-right">{{ props.item.horas_laboratorio }}</td>
        <td class="text-xs-right">{{ props.item.horas_ejercicios }}</td>
        <td class="text-xs-right">{{ props.item.version_plan_estudios }}</td>
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
        No hay Asignaturas en la base de datos
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
        { text: 'Asistencia minima', value: 'asistencia_minima' },
        { text: 'Ponderacion', value: 'ponderacion' },
        { text: 'Nivel', value: 'nivel' },
        { text: 'Horas teoria', value: 'horas_teoria' },
        { text: 'Horas laboratorio', value: 'horas_laboratorio' },
        { text: 'Horas ejercicios', value: 'horas_ejercicios' },
        { text: 'Version plan estudios', value: 'version_plan_estudios' },

        { text: 'Actions', value: 'nombre', sortable: false }
      ],
      AsignaturasTabla: [],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        codigo: 0,
        asistencia_minima: 0,
        nombre: '',
        ponderacion: '',
        nivel: 0,
        horas_teoria: 0,
        horas_laboratorio: 0,
        horas_ejercicios: 0,
        version_plan_estudios: ''

      },
      defaultItem: {
        asistencia_minima: 0,
        nombre: '',
        ponderacion: '',
        nivel: 0,
        horas_teoria: 0,
        horas_laboratorio: 0,
        horas_ejercicios: 0,
        version_plan_estudios: ''
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
            asistencia_minima: 44444444,
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
        if (confirm('¿Seguro que quieres eliminar este Asignatura? (Esta accion no se puede deshacer)') && this.desserts.splice(index, 1)) {
            axios.delete('http://192.168.10.10/Asignatura/'+this.editedItem.codigo, {
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
            axios.put('http://192.168.10.10/Asignatura/'+this.editedItem.codigo, {
                'asistencia_minima': this.editedItem.asistencia_minima,
                'nombre': this.editedItem.nombre,
                'ponderacion': this.editedItem.ponderacion,
                'nivel': this.editedItem.nivel,
                'horas_teoria': this.editedItem.horas_teoria,
                'horas_laboratorio': this.editedItem.horas_laboratorio,
                'horas_ejercicios': this.editedItem.horas_ejercicios,
                'version_plan_estudios': this.editedItem.version_plan_estudios
            }).then(response => {

            });
        } else {
          this.desserts.push(this.editedItem)
            axios.post('http://192.168.10.10/Asignatura/', {
                'asistencia_minima': this.editedItem.asistencia_minima,
                'nombre': this.editedItem.nombre,
                'ponderacion': this.editedItem.ponderacion,
                'nivel': this.editedItem.nivel,
                'horas_teoria': this.editedItem.horas_teoria,
                'horas_laboratorio': this.editedItem.horas_laboratorio,
                'horas_ejercicios': this.editedItem.horas_ejercicios,
                'version_plan_estudios': this.editedItem.version_plan_estudios
            }).then(response => {

            });
        }
        this.close()
      },
      getAsignaturas() {
            axios.get('http://192.168.10.10/Asignatura/', {
            }).then(response => {
                this.desserts=response.data;
            });
        }
    },
    beforeMount() {
          this.getAsignaturas();
      },
  }
</script>