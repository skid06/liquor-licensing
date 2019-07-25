<template>
  <div class="dashboard">
    <v-subheader class="mt-1 mb-2"><h1>Violations</h1></v-subheader>
    <v-tabs
      color=""
      slider-color="yellow"
    >
      <v-tab
        v-for="header in violation.headers"
        :key="header"
        ripple
      >
        {{ header.title }}

      </v-tab>
      <v-tab-item
        v-for="header in violation.headers"
        :key="header"
      >
      <div>
        <v-toolbar flat color="white">
          <v-toolbar-title> {{ header.title }} </v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
        <v-data-table
          :headers="headers"
          :items="filterStatus(`${header.payload}`)"
          class="elevation-1"
        >
          <template v-slot:items="props">
            <td>{{ props.item.violator_name }}</td>
            <td class="text-xs-left">{{ props.item.violator_address }}</td>
            <td class="text-xs-left">{{ props.item.violator_city }}</td>
            <td class="text-xs-left">{{ props.item.violator_state }}</td>
            <td class="text-xs-left">{{ props.item.violator_zip }}</td>
            <td class="text-xs-left">{{ props.item.complainant_name }}</td>
            <td class="justify-center layout px-0">
              <v-icon
                small
                class="mr-2"
                @click="viewViolation(props.item.id)"
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
      violation: {
        headers: [
          { title: 'All', payload: 'all' },
          { title: 'Processing', payload: 'processing'},
          { title: 'Waiting', payload: 'waiting'},
          { title: 'Rejected', payload: 'rejected'},
          { title: 'Done', payload: 'done'}
        ]
      },
      violations: [],
      dialog: false,
      headers: [
        {
          text: 'Violator Name',
          align: 'left',
          value: 'name'
        },
        { text: 'Violator Address', value: 'address' },
        { text: 'Violator City', value: 'email' },
        { text: 'Violator State', value: 'contact_person' },
        { text: 'Violator Zip', value: 'classification' },
        { text: 'Complainant Name', value: 'classification' },
        { text: 'Actions', value: 'name', sortable: false }
      ],
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
  
  methods: {
    viewViolation (id) {
      window.location = `/admin/violation/${id}`

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
    getViolations(){
      axios
        .get(`/api/admin/violations`)
        .then(response => {
          console.log(response.data)
          this.violations = response.data.violations
          // return this.applications.filter(app => app.status == "completed")
        })
    },
    filterStatus(status){
      if(status == 'all'){
        return this.violations.filter(app => app.status != 'incomplete')
      }
      return this.violations.filter(app => app.status == status)
    },
  },
  mounted() {
    this.getViolations()
  }
}
</script>
