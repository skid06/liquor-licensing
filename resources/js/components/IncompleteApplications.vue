<template>
  <div class="container">
    <h2>Incomplete Applications</h2>         
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
        <tr v-for="application in incomplete.data" :key="application.id">
          <td><a :href="`/applications/show/${ application.id }/incomplete`"> {{ application.corporate_name }} </a></td>
          <td>Doe</td>
          <td>{{ application.business_email }}</td>
          <td>{{ application.created_at }}</td>
        </tr>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !incomplete.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(incomplete.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ incomplete.current_page }} of {{ incomplete.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !incomplete.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(incomplete.next_page_url)">Next</a></li>
      </ul>
    </nav>    
  </div>  
</template>

<script>
import axios from 'axios'
export default {
  data(){
    return {
      incomplete: [],     
    }
  },
  mounted(){
    this.getIncompleteApplications()
  },
  methods: {
    getIncompleteApplications(){
      axios
        .get('/api/user/applications/incomplete/no')
        .then(response => {
            console.log(response)
            this.incomplete = response.data.applications            
        })
    },
    getApplications(page){
      let url
      if (page == null) {
        url = '/api/user/applications'
      } else {
        // url = `/user/applications?page=${page}`
        url = page
      }
      axios.get(url)
      .then(response => {
        console.log(response.data)
        this.incomplete = response.data.applications
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
