<template>
    <div>
      <v-toolbar flat color="white">
        <v-toolbar-title>Mis Documentos</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
      </v-toolbar>
      <v-data-table
        :headers="headers"
        :items="documentos"
        class="elevation-1"
      >
        <template v-slot:items="props">
          <td>{{ props.item.name }}</td>
          <td class="text-center">{{ props.item.fecha }}</td>
          <td class="text-xs-right"> <v-btn small color = "success"> Descargar </v-btn> </td>
          <td class="justify-center">
            <v-icon
              small
              @click="deleteItem(props.item)"
            >
              delete
            </v-icon>
          </td>
        </template>
        <template v-slot:no-data>
          <v-btn color="primary" @click="initialize">Reset</v-btn>
        </template>
      </v-data-table>
      <v-card>
        <v-card-text> 
          <v-card-actions>
            <v-btn small color = "primary"> Subir <v-icon right dark> cloud_upload </v-icon> </v-btn>
          </v-card-actions>  
        </v-card-text> 
      </v-card>
    </div>
</template>

<script>
  export default {
    name: "DocumentosProfesor",
    data: () => ({
    dialog: false,
    headers: [
      {
        text: 'Documentos',
        align: 'left',
        sortable: false,
        value: 'name'
      },
      { text: 'Fecha', value: 'fecha' },
      {},
      { text: 'Actions', value: 'name', sortable: false }
    ],
  }),

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
      this.documentos = [
        {
          name: 'Estudio de los procesos.pdf',
          fecha: "26/07/19",
          url: " ",
        },
        {
          name: 'Trabajo de la fisica cuantica.pdf',
          fecha: "10/07/19",
          url: " ",
        },
        {
          name: 'Paper de estudio.pdf',
          fecha: "05/04/19",
          url: " ",
        },
        {
          name: 'Investigacíon.pdf',
          fecha: "20/03/19",
          url: " ",
        },
        {
          name: 'Tesis doctoral.pdf',
          fecha: "01/02/19",
          url: " ",
        },
        {
          name: 'Presentación.pdf',
          fecha: "20/03/19",
          url: " ",
        },
        {
          name: 'Documento.pdf',
          fecha: "18/06/19",
          url: " ",
        },
        {
          name: 'Investigacíon2.pdf',
          fecha: "12/01/19",
          url: " ",
        },
        {
          name: 'Fechas.pdf',
          fecha: "25/05/19",
          url: " ",
        },
        {
          name: 'Laboratorio.pdf',
          fecha: "28/02/19",
          url: " ",
        }
      ]
    },

    deleteItem (item) {
      const index = this.documentos.indexOf(item)
      confirm('Seguro que deseas eliminar este elemento?') && this.documentos.splice(index, 1)
    },

    close () {
      this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },
    }
  }
</script>