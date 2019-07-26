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
          this.initialize()
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
                  ],

                  this.comprobante = [
                      {
                          name: 'Matrícula',
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
      }
  }
</script>
