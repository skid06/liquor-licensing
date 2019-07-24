<template>
  <div class="applications">
    <v-subheader class="mt-5 mb-2"><h1>Payments</h1></v-subheader>
      <div>
        <!-- <v-toolbar flat color="white">
          <v-toolbar-title>  </v-toolbar-title>
          <v-divider
            class="mx-2"
            inset
            vertical
          ></v-divider>
          <v-spacer></v-spacer>
        </v-toolbar> -->
        <v-data-table
          :headers="headers"
          :items="payments"
          class="elevation-1"
        >
          <template v-slot:items="props">
            <td>{{ props.item.application.business_name }}</td>
            <td class="text-xs-left">{{ props.item.user.name }}</td>
            <td class="text-xs-left"><strong>$</strong>{{ props.item.amount }}</td>
            <td class="text-xs-left">{{ props.item.created_at }}</td>
            <td class="text-xs-left">{{ props.item.description }}</td>
            <td class="justify-center layout px-0">
              <!-- <v-icon
                small
                class="mr-2"
                @click="viewApplication(props.item.id)"
              >
                edit
              </v-icon>
              <v-icon
                small
                @click="deleteItem(props.item)"
              >
                delete
              </v-icon> -->
            </td>
          </template>
        </v-data-table>
      </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      payments: [],
      dialog: false,
      headers: [
        {
          text: 'Business Name',
          align: 'left',
          value: 'name'
        },
        { text: 'Owner', value: 'owner' },
        { text: 'Amount', value: 'amount' },
        { text: 'Date', value: 'date' },
        { text: 'Actions', value: 'name', sortable: false }
      ],    
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

  mounted () {
    this.getPayments()
  },  
  methods: {
    getPayments(){
      axios
        .get(`/api/payments`)
        .then(response => {
          console.log(response.data)
          this.payments = response.data.payments
        })
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
