<template>
  <div class="container">
    <h2>Completed Applications</h2>         
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Corporate Name</th>
          <th>Paid</th>
          <th>Email</th>
          <th>Joined</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="application in completed.data" :key="application.id">
          <td><a :href="`/applications/show/${ application.id }/completed`">{{ application.corporate_name }}</a></td>
          <td>Yes</td>
          <td>{{ application.business_email }}</td>
          <td>{{ application.created_at }}</td>
        </tr>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !completed.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(completed.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ completed.current_page }} of {{ completed.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !completed.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(completed.next_page_url)">Next</a></li>
      </ul>
    </nav>    
  </div>  
</template>

<script>
import axios from 'axios'
export default {
  data(){
    return {
      completed: [],      
    }
  },
  mounted(){
    this.getCompletedApplications()
  },
  methods: {
    getCompletedApplications(){
      axios
        .get('/api/user/applications/completed/no')
        .then(response => {
            console.log(response)
            this.completed = response.data.applications            
        })
    },
    getApplications(page){
      let url
      if (page == null) {
        url = '/api/user/applications/completed/no'
      } else {
        // url = `/user/applications?page=${page}`
        url = page
      }
      axios.get(url)
      .then(response => {
        console.log(response.data)
        this.completed = response.data.applications
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
