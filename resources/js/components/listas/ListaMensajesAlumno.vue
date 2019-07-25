<template>
     <div class="mt-2">
        <v-flex xs12  sm8 offset-sm1>
        
            <v-card class="mx-auto">
                <v-container>


                    <div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Mensajes </v-toolbar-title>
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

          

          <v-card-actions>
            <v-spacer></v-spacer>
            
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
        <td>{{ props.item.asunto }}</td>
        <td class="text-xs-right">{{ props.item.contenido }}</td>
        <td class="text-xs-right">{{ props.item.rut_profesor }}</td>
        <td class="justify-center layout px-0">
          
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
        No hay Mensajes disponibles
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
      userid: '',
      userid: '',
      headers: [
        {
          text: 'Asunto',
          align: 'left',
          sortable: false,
          value: 'rut_profesor'
        },
        { text: 'Contenido', value: 'asunto' },
        { text: 'rut profesor', value: 'contenido' },

        { text: 'Actions', value: 'nombre', sortable: false }
      ],
      AsignaturasTabla: [],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        id: 0,
        asunto: 0,
        contenido: '',
        rut_profesor: 0
      },
      defaultItem: {
        asunto: 0,
        contenido: '',
        rut_profesor: 0
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
        if (confirm('¿Seguro que quieres eliminar este Mensaje?') && this.desserts.splice(index, 1)) {
            axios.delete('http://192.168.10.10/Mensaje/'+this.editedItem.id, {
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
            let url = window.location.href;
            let splitted = url.split("/alumno/");
            let userId = splitted[1];
            splitted = userId.split("/");
            userId = splitted[0];
            this.userid = userId;
        },

      save () {
        
      },
      getMensajes() {
            axios.get('http://192.168.10.10/Alumno/getMensaje/'+ this.userid, {
            }).then(response => {
                this.desserts=response.data;
            });
        },
    },
    beforeMount() {
        this.getUserName();
        this.getMensajes();
      },
  }
</script>