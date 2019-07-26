<template>
  <div class="dashboard">
    <!-- <v-layout>
      <div class="text-xs-center left">
        <v-menu
          transition="slide-x-transition"
          bottom
          
        >
          <template v-slot:activator="{ on }">
            <v-btn
              color="primary"
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
              @click="getReports()"
            >
              <v-list-tile-title>{{ item.text }}</v-list-tile-title>
            </v-list-tile>
          </v-list>
        </v-menu>
      </div> 
    </v-layout> -->
   
    <!-- <v-layout row wrap class="mb-500">
      <v-flex x12 sm4 md4 v-for="item in items" :key="item">
        <v-card flat class="text-xs-center ma-3" :color="item.color" height=100>
          <v-card-title>
            <div>
               <div class="headline"><v-btn size="45" flat class="white--text"> {{ item.text }}: 100 </v-btn></div>
            </div>
          </v-card-title>
          <v-card-actions>
           
          </v-card-actions>    
        </v-card>
      </v-flex>
    </v-layout> -->
    <v-spacer ></v-spacer>
    <!-- <v-subheader class="mt-5 mb-2"><h1>Applications</h1></v-subheader> -->
    <v-tabs
      color=""
      
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
        </v-toolbar>
        <v-data-table
          :headers="headers"
          :sort-by="['props.item.business_name']"
          :sort-desc="[false, true]"
          multi-sort          
          :items="filterStatus(`${header.payload}`)"
          class="elevation-1"
        >
          <template v-slot:items="props">
            <td>{{ props.item.business_name }}</td>
            <td class="text-xs-left">{{ props.item.business_address }}</td>
            <td class="text-xs-left">{{ props.item.business_contact_person }}</td>
            <td class="text-xs-left">{{ props.item.business_classification }}</td>
            <td class="text-xs-left">{{ props.item.updated_at | moment("MMM DD, YYYY")  }}</td>
            <td class="text-xs-left">{{ props.item.notes[props.item.notes.length - 1] }}</td>
            <td class="justify-center layout px-0">
              <v-icon
                small
                class="mr-2"
                @click="viewApplication(props.item.id)"
              >
                edit
              </v-icon>
              <!-- <v-icon
                small
                @click="deleteItem(props.item)"
              >
                delete
              </v-icon> -->
            </td>
          </template>
          <template v-slot:no-data>
            <v-btn color="primary">Reset</v-btn>
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
          { title: 'Saved', payload: 'saved'},
          { title: 'Paid', payload: 'paid'},
          { title: 'Processed', payload: 'processed'},          
          { title: 'Expired', payload: 'expired'},
        ]
      },
      applications: [],
      items: [
        { text: 'Total Sales', icon: 'show_chart', color: 'primary' },
        { text: 'Processed Applications', icon: 'assignment', color: 'error' },
        { text: 'Paid Applications', icon: 'gradient', color: 'success' }
      ],
      text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      date_ranges: [
        { text: 'Yesterday', value: '' },
        { text: 'Past 7 Days', value: '' },
        { text: 'This Month', value: '' },
        { text: 'Past 3 Months', value: '' },
        { text: 'Past 6 Months', value: '' },
        { text: 'This Year', value: '' },
        { text: 'Last Year', value: '' },
        { text: 'All Time', value: '' },
      ],
      dialog: false,
      headers: [
        {
          text: 'Business Name',
          align: 'left',
          value: 'name'
        },
        { text: 'Business Address', value: 'address' },
        { text: 'Contact Person', value: 'contact_person' },
        { text: 'Business Classification', value: 'classification' },
        { text: 'Last Modified', value: 'modified' },
        { text: 'Last Note Modified', value: 'note_modified' },
        { text: 'Actions', value: 'name', sortable: false }
      ],
      desserts: [],
      editedIndex: -1,     
      total_sales: '',
      processed: '',
      paid: ''
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

  },  
  
  methods: {
    editItem (item) {
      this.editedIndex = this.desserts.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    viewApplication (id) {
      window.location = `/admin/liquor-application/${id}`

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
    },

    getReports(){

    }
  },
  mounted() {
    this.getApplications()
  }
}
</script>
