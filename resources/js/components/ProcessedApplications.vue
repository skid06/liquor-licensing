<template>
  <div class="container">
    <h2>Processed Applications</h2>         
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
        <tr v-for="application in processed.data" :key="application.id">
          <td>{{ application.corporate_name }}</td>
          <td>Doe</td>
          <td>{{ application.business_email }}</td>
          <td>{{ application.created_at }}</td>
        </tr>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !processed.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(processed.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ processed.current_page }} of {{ processed.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !processed.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(processed.next_page_url)">Next</a></li>
      </ul>
    </nav>    
  </div>  
</template>

<script>
import axios from 'axios'
export default {
  data(){
    return {
      processed: [],
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
    this.getProcessedApplications()
  },
  methods: {
    getProcessedApplications(){
      axios
        .get('/user/applications')
        .then(response => {
            console.log(response)
            this.processed = response.data.processed
            // this.meta.current_page = response.data.processed.current_page
            // this.meta = response.data.processed
            
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
        this.processed = response.data.processed
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
