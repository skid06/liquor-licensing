<template>
  <div class="dashboard">
    <v-layout>
      <div class="text-xs-center left">
        <v-menu
          transition="slide-x-transition"
          bottom
          
        >
          <template v-slot:activator="{ on }">
            <v-btn
              color="cyan"
              dark
              v-on="on"
            >
              Filter Date
            </v-btn>
          </template>

          <v-list>
            <v-list-tile
              v-for="(item, i) in date_ranges"
              :key="i"
              @click=""
            >
              <v-list-tile-title>{{ item.text }}</v-list-tile-title>
            </v-list-tile>
          </v-list>
        </v-menu>
      </div> 
    </v-layout>
   
    <v-layout row wrap class="mb-500">
      <v-flex x12 sm4 md4 v-for="item in items" :key="item">
        <v-card flat class="text-xs-center ma-3" :color="item.color" height=100>
          <v-card-title>
            <div>
              <div class="headline"><v-icon dark size="40" class="pt-2"> {{ item.icon }} </v-icon></div>
               <v-btn size="45" flat class="white--text"> {{ item.text }}: 100 </v-btn>
            </div>
          </v-card-title>
          <v-card-actions>
           
          </v-card-actions>    
        </v-card>
      </v-flex>
    </v-layout>
    <v-spacer ></v-spacer>
    <v-subheader class="mt-5 mb-2"><h1>Applications</h1></v-subheader>
    <v-tabs
      v-model="active"
      color="cyan"
      dark
      slider-color="yellow"
    >
      <v-tab
        v-for="header in application.headers"
        :key="header"
        ripple
      >
        {{ header.title }}

      </v-tab>
      <v-tab-item
        v-for="header in application.headers"
        :key="header"
      >
      <div>
        <v-toolbar flat color="white">
          <v-toolbar-title> {{ header.title }} </v-toolbar-title>
          <!-- <v-divider
            class="mx-2"
            inset
            vertical
          ></v-divider> -->
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ on }">
              <v-btn color="primary" dark class="mb-2" v-on="on">New Item</v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="headline">{{ formTitle }}</span>
              </v-card-title>

              <v-card-text>
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm6 md4>
                      <v-text-field v-model="editedItem.name" label="Dessert name"></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md4>
                      <v-text-field v-model="editedItem.calories" label="Calories"></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md4>
                      <v-text-field v-model="editedItem.fat" label="Fat (g)"></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md4>
                      <v-text-field v-model="editedItem.carbs" label="Carbs (g)"></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md4>
                      <v-text-field v-model="editedItem.protein" label="Protein (g)"></v-text-field>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
                <v-btn color="blue darken-1" flat @click="save">Save</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
        <v-data-table
          :headers="headers"
          :items="filterStatus(`${header.payload}`)"
          class="elevation-1"
        >
          <template v-slot:items="props">
            <td>{{ props.item.business_name }}</td>
            <td class="text-xs-left">{{ props.item.business_address }}</td>
            <td class="text-xs-left">{{ props.item.business_email }}</td>
            <td class="text-xs-left">{{ props.item.business_contact_person }}</td>
            <td class="text-xs-left">{{ props.item.business_classification }}</td>
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
            <v-btn color="primary" @click="initialize">Reset</v-btn>
          </template>
        </v-data-table>
      </div>

      </v-tab-item>
    </v-tabs>
  </div>
</template>

<script>
export default {
  data() {
    return {
      application: {
        headers: [
          { title: 'All', payload: 'all' },
          { title: 'Processed', payload: 'processed'},
          { title: 'Completed', payload: 'completed'},
          { title: 'Expired', payload: 'expired'},
        ]
      },
      applications: [],
      items: [
        { text: 'Total Sales', icon: 'show_chart', color: 'primary' },
        { text: 'Processed Applications', icon: 'assignment', color: 'error' },
        { text: 'Completed Applications', icon: 'gradient', color: 'success' }
      ],
      text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      date_ranges: [
        { text: 'Yesterday' },
        { text: 'Past 7 Days' },
        { text: 'This Month' },
        { text: 'Past 3 Months' },
        { text: 'Past 6 Months' },
        { text: 'This Year' },
        { text: 'Last Year' },
        { text: 'All Time' },
      ],
      dialog: false,
      headers: [
        {
          text: 'Business Name',
          align: 'left',
          value: 'name'
        },
        { text: 'Business Address', value: 'address' },
        { text: 'Business Email', value: 'email' },
        { text: 'Contact Person', value: 'contact_person' },
        { text: 'Business Classification', value: 'classification' },
        { text: 'Actions', value: 'name', sortable: false }
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0
      },
      defaultItem: {
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0
      }      
    }
  },

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
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0
        },
        {
          name: 'Ice cream sandwich',
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3
        },
        {
          name: 'Eclair',
          calories: 262,
          fat: 16.0,
          carbs: 23,
          protein: 6.0
        },
        {
          name: 'Cupcake',
          calories: 305,
          fat: 3.7,
          carbs: 67,
          protein: 4.3
        },
        {
          name: 'Gingerbread',
          calories: 356,
          fat: 16.0,
          carbs: 49,
          protein: 3.9
        },
        {
          name: 'Jelly bean',
          calories: 375,
          fat: 0.0,
          carbs: 94,
          protein: 0.0
        },
        {
          name: 'Lollipop',
          calories: 392,
          fat: 0.2,
          carbs: 98,
          protein: 0
        },
        {
          name: 'Honeycomb',
          calories: 408,
          fat: 3.2,
          carbs: 87,
          protein: 6.5
        },
        {
          name: 'Donut',
          calories: 452,
          fat: 25.0,
          carbs: 51,
          protein: 4.9
        },
        {
          name: 'KitKat',
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7
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
    },
    getApplications(){
      axios
        .get(`/api/admin/applications`)
        .then(response => {
          console.log(response.data)
          this.applications = response.data.applications
          // return this.applications.filter(app => app.status == "completed")
        })
    },
    filterStatus(status){
      if(status == 'all'){
        return this.applications.filter(app => app.status != 'incomplete')
      }
      return this.applications.filter(app => app.status == status)
    }    
  },
  mounted() {
    this.getApplications()
  }
}
</script>
