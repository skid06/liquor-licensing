<template>
  <div class="container">
    <h2>Paid Applications</h2>         
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Corporate Name</th>
          <th>User</th>
          <th>Email</th>
          <th>Joined</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="application in paid.data" :key="application.id">
          <td>{{ application.corporate_name }}</td>
          <td>Doe</td>
          <td>{{ application.business_email }}</td>
          <td>{{ application.created_at }}</td>
        </tr>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !paid.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(paid.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ paid.current_page }} of {{ paid.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !paid.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(paid.next_page_url)">Next</a></li>
      </ul>
    </nav>    
  </div>  
</template>

<script>
import axios from 'axios'
export default {
  data(){
    return {
      paid: [],
      links:{
        first: null,
        last: null,
        next: null,
        prev: null
      },
      meta:{
        current_page: null,
        from: null,
        last_page: null,
        path: null,
        per_page: null,
        to: null,
        total: null
      }      
    }
  },
  mounted(){
    this.getPaidApplications()
  },
  methods: {
    getPaidApplications(){
      axios
        .get('/user/applications')
        .then(response => {
            console.log(response)
            this.paid = response.data.paid
            // this.meta.current_page = response.data.paid.current_page
            // this.meta = response.data.paid
            
        })
    },
    getApplications(page){
      let url
      if (page == null) {
        url = '/user/applications'
      } else {
        // url = `/user/applications?page=${page}`
        url = page
      }
      axios.get(url)
      .then(response => {
        console.log(response.data)
        this.paid = response.data.paid
      })
      .catch(err => console.log(err))
    },    
  }
}
</script>

<style scoped>
.table{
  background-color: white;
}
</style>
