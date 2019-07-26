<template>
  <v-app id = "inspire">
    <div>
      <v-toolbar flat color = "white">
        <v-toolbar-title> Documentos </v-toolbar-title>
        <v-spacer></v-spacer>
      </v-toolbar>
      <v-data-table
        :headers="headers"
        :items="documentos"
        :expand="expand"
        item-key="tipo"
      >
        <template v-slot:items="props">
          <tr @click="props.expanded = !props.expanded">
            <td>{{ props.item.tipo }}</td>
          </tr>
        </template>
        <template v-slot:expand="props">
          <div v-for = "i in documentos">
            <div v-for = "j in i.documento"> <p class="text-sm-left"> {{j}} </p>
              <v-card flat >
                <v-card-text> 
                  <v-card-actions>
                    <v-btn small color = "success"> Descargar </v-btn>
                    <v-btn small color = "primary"> Subir <v-icon right dark> cloud_upload </v-icon> </v-btn>
                  </v-card-actions>  
                </v-card-text> 
              </v-card>
            </div>  
          </div>   
        </template>
      </v-data-table>
    </div>
  </v-app>
</template>

<script>
  export default {
    name: "DocumentosProfesor",
    data () {
      return {
        expand: false,
        headers: [
          {
            text: 'Documentos',
            align: 'left',
            value: 'tipo',
          },
        ],
        documentos: [
          {
            tipo: 'Material',
            documento: [
              'Investigación',
              'Clases',
              'Guias',
            ]
          },   
        ],
      }
    }
  }
</script>