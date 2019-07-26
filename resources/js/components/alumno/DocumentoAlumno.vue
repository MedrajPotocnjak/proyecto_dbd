<template>
	<div>
      <v-spacer></v-spacer>
        <div v-if="loading" justify-center>
            <v-progress-circular
                :width="3"
                color="primary"
                indeterminate
            ></v-progress-circular>
        </div>
      <v-container v-else grid-list-xs text-xs-center md1>
            <v-expansion-panel>
                    <v-expansion-panel-content v-bind:class="dark">
                        <div slot="header">Certificado de alumno regular</div>
        <v-divider
          class="mx-2"
          inset
          vertical
        ></v-divider>
      <v-data-table
        :headers="certificado"
        :items="certificado"
        class="elevation-1"
      >
        <template v-slot:items="props">
          <td>{{ props.item.name }}</td>
          <td class="text-xs-right"><v-btn small color = "success" @click="downloadCert"> Descargar </v-btn></td>
        </template>
        <template v-slot:no-data>
        </template>
      </v-data-table>
                    </v-expansion-panel-content>
              </v-expansion-panel>
        </v-container>
      <v-spacer></v-spacer>
      <div v-if="loading" justify-center>
            <v-progress-circular
                :width="3"
                color="primary"
                indeterminate
            ></v-progress-circular>
        </div>
      <v-container v-else grid-list-xs text-xs-center md1>
            <v-expansion-panel>
                    <v-expansion-panel-content v-bind:class="dark">
                        <div slot="header">Solicitud</div>
        <v-divider
          class="mx-2"
          inset
          vertical
        ></v-divider>
      <v-data-table
        :headers="solicitud"
        :items="solicitud"
        class="elevation-1"
      >
        <template v-slot:items="props">
          <td>{{ props.item.name }}</td>
          <td class="text-xs-right"><v-btn small color = "success"> Descargar </v-btn></td> 
        </template>
        <template v-slot:no-data>
          <v-btn color="primary" @click="initialize">Reset</v-btn>
        </template>
      </v-data-table>
                    </v-expansion-panel-content>
              </v-expansion-panel>
        </v-container>
      
      <v-spacer></v-spacer>
      <div v-if="loading" justify-center>
            <v-progress-circular
                :width="3"
                color="primary"
                indeterminate
            ></v-progress-circular>
        </div>
      <v-container v-else grid-list-xs text-xs-center md1>
            <v-expansion-panel>
                    <v-expansion-panel-content v-bind:class="dark">
                        <div slot="header">Comprobante</div>
        <v-divider
          class="mx-2"
          inset
          vertical
        ></v-divider>
      <v-data-table
        :headers="comprobante"
        :items="comprobante"
        class="elevation-1"
      >
        <template v-slot:items="props">
          <td>{{ props.item.nombre }}</td>
          <td class="text-xs-right"><v-btn small color = "success" @click="downloadCompr(props.item)"> Descargar </v-btn></td>
        </template>
        <template v-slot:no-data>
            No hay Comprobantes
        </template>
      </v-data-table>
                    </v-expansion-panel-content>
              </v-expansion-panel>
        </v-container>
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
      data() {
          return {
              dialog: false,
              comprobante: [],
              headers: [
                  {
                      text: 'Documento',
                      align: 'left',
                      sortable: false,
                      value: 'name'
                  },
                  {text: 'Control 1', value: 'control_1'},
                  {},
              ],
          }
      },
      watch: {
          dialog(val) {
              val || this.close()
          }
      },

      created() {
          this.initialize();
      },
      beforeMount () {
          this.getUserName();
      },
      methods: {
          initialize() {
              this.certificado = [
                  {
                      name: 'Asignación Familiar',
                  },
                  {
                      name: 'Pase Escolar',
                  },
                  {
                      name: 'Rebaja Pasaje',
                  },
                  {
                      name: 'Beca Estudios'
                  },
              ],

                  this.solicitud = [
                      {
                          name: 'Reincorporación',
                      },
                      {
                          name: 'Cambio Carrera',
                      },
                  ]

          },

          close() {
              this.dialog = false
              setTimeout(() => {
                  this.editedItem = Object.assign({}, this.defaultItem)
                  this.editedIndex = -1
              }, 300)
          },
          getUserName:function() {
              let url=window.location.href;
              let splitted=url.split("/alumno/");
              let userId=splitted[1];
              splitted=userId.split("/");
              userId=splitted[0];
              this.userid=userId;
              axios.get('http://192.168.10.10/Alumno/getPagos/'+this.userid, {
              }).then(response => {
                  this.comprobante=response.data;
              });
          },
          downloadCert(item) {
              axios({
                  url: 'http://192.168.10.10/Alumno/downloadCertificado/'+this.userid,
                  method: 'GET',
                  responseType: 'blob', // important
              }).then((response) => {
                  const url = window.URL.createObjectURL(new Blob([response.data]));
                  const link = document.createElement('a');
                  link.href = url;
                  link.setAttribute('download', 'file.pdf');
                  document.body.appendChild(link);
                  link.click();
              });
          },
          downloadCompr(item) {
              axios({
                  url: 'http://192.168.10.10/Alumno/downloadComprobante/'+this.userid,
                  method: 'GET',
                  responseType: 'blob', // important
                  params: {
                      'cosa': item.nombre,
                      'costo': item.costo
                  },
              }).then((response) => {
                  const url = window.URL.createObjectURL(new Blob([response.data]));
                  const link = document.createElement('a');
                  link.href = url;
                  link.setAttribute('download', 'comprobante.pdf');
                  document.body.appendChild(link);
                  link.click();
              });
          }
      }
  }
</script>
