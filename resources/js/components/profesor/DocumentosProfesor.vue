<template>
    <div>
      <v-toolbar flat color="white">
        <v-toolbar-title>Mis Estudios</v-toolbar-title>
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
          <td>{{ props.item.titulo }}</td>
          <td class="text-center">{{ props.item.created_at }}</td>
          <td class="text-xs-right"> <v-btn small color = "success" @click="downloadItem(props.item)"> Descargar </v-btn> </td>
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

        </template>
      </v-data-table>
      <v-card>
        <v-card-text> 
          <v-card-actions>
              <input type="file" class="form-control" v-on:change="onImageChange">
            <v-btn small color = "primary" @click="formSubmit"> Subir <v-icon right dark> cloud_upload </v-icon> </v-btn>
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
    userid: 0,
    documentos: [],
    name: '',
    file: '',
    success: '',
    headers: [
      {
        text: 'Documentos',
        align: 'left',
        sortable: false,
        value: 'titulo'
      },
      { text: 'Fecha', value: 'created_at' },
      {},
      { text: 'Actions', value: 'name', sortable: false }
    ],
  }),

  watch: {
    dialog (val) {
      val || this.close()
    }
  },

  beforeMount () {
    this.getUserName();
  },

  methods: {
    initialize () {
      this.documentos = [
        {
            titulo: 'Estudio de los procesos.pdf',
            created_at: "26/07/19",
            ruta_estudio: " ",
        },
        {
            titulo: 'Trabajo de la fisica cuantica.pdf',
            created_at: "10/07/19",
            ruta_estudio: " ",
        },
        {
            titulo: 'Paper de estudio.pdf',
            created_at: "05/04/19",
            ruta_estudio: " ",
        },
        {
            titulo: 'Investigacíon.pdf',
            created_at: "20/03/19",
            ruta_estudio: " ",
        },
        {
            titulo: 'Tesis doctoral.pdf',
            created_at: "01/02/19",
            ruta_estudio: " ",
        },
        {
            titulo: 'Presentación.pdf',
            created_at: "20/03/19",
            ruta_estudio: " ",
        },
        {
            titulo: 'Documento.pdf',
            created_at: "18/06/19",
            ruta_estudio: " ",
        },
        {
            titulo: 'Investigacíon2.pdf',
            created_at: "12/01/19",
            ruta_estudio: " ",
        },
        {
            titulo: 'Fechas.pdf',
            created_at: "25/05/19",
            ruta_estudio: " ",
        },
        {
            titulo: 'Laboratorio.pdf',
            created_at: "28/02/19",
            ruta_estudio: " ",
        }
      ]
    },

    deleteItem (item) {
      const index = this.documentos.indexOf(item)
        this.editedItem = Object.assign({}, item)
      if (confirm('Seguro que deseas eliminar este elemento?') && this.documentos.splice(index, 1)) {
          axios.delete('http://192.168.10.10/Estudio/'+this.editedItem.codigo, {
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
      getUserName:function() {
          let url=window.location.href;
          let splitted=url.split("/profesor/");
          let userId=splitted[1];
          splitted=userId.split("/");
          userId=splitted[0];
          this.userid=userId;
          axios.get('http://192.168.10.10/Profesor/verEstudios/'+this.userid, {
          }).then(response => {
              this.documentos=response.data;
          });
      },
      formSubmit(e) {
          e.preventDefault();
          let currentObj = this;
          const config = {
              headers: {'content-type': 'multipart/form-data'}
          };
          let formData = new FormData();
          formData.append('file', this.file);
          axios.post('http://192.168.10.10/Profesor/subirEstudio/'+this.userid, formData, config)
              .then(function (response) {
                console.log('exito');
              })
              .catch(function (error) {
                console.log('error');
              });
          },
      onImageChange(e){
          console.log(e.target.files[0]);
          this.file = e.target.files[0];

      },
      downloadItem(item) {
          console.log(item.titulo);
          axios({
              url: 'http://192.168.10.10/Profesor/bajarEstudio/',
              method: 'GET',
              responseType: 'blob', // important
              params: {
                  'nombreArchivo': item.titulo
              },
          }).then((response) => {
              const url = window.URL.createObjectURL(new Blob([response.data]));
              const link = document.createElement('a');
              link.href = url;
              link.setAttribute('download', 'file.pdf');
              document.body.appendChild(link);
              link.click();
          });
      }
      }
  }
</script>
