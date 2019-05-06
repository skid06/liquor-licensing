<template>
  <div class="applications">
    <!-- <v-subheader class="mt-5 mb-2"><h1>Applications</h1></v-subheader> -->
      <div>
        <v-toolbar flat color="#404041" dark>
          <v-toolbar-title> {{ status | capitalize }} </v-toolbar-title>
        </v-toolbar>
        <v-data-table
          :headers="headers"
          :items="applications"
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
                @click="viewApplication(props.item.id)"
              >
                edit
              </v-icon>
              <v-icon
                small
                @click="deleteItem(props.item)"
                v-if="props.item.status == 'saved'"
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
  </div>
</template>

<script>
export default {
  data() {
    return {
      applications: [],
      application: {
        headers: [
          { title: 'All' },
          { title: 'Processed' },
          { title: 'Completed' },
          { title: 'Paid' },
          { title: 'Expired' },
        ]
      },
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
    this.getApplications(this.status)
  },  
  props: ['status'],
  methods: {
    getApplications(status){
      axios
        .get(`/user/applications/status/${status}`)
        .then(response => {
          console.log(response.data)
          this.applications = response.data.applications
        })
    },

    viewApplication (id) {
      window.location = `/liquor-application/${id}`
      // console.log(item)
      // this.editedIndex = this.desserts.indexOf(item)
      // this.editedItem = Object.assign({}, item)
      // this.dialog = true
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
    }    
  },
  filters: {
    capitalize: function (value) {
      if (!value) return ''
      value = value.toString()
      return value.charAt(0).toUpperCase() + value.slice(1)
    }
  }  
}
</script>
