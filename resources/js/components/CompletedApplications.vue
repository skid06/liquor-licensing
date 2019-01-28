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
    this.getCompletedApplications()
  },
  methods: {
    getCompletedApplications(){
      axios
        .get('/user/applications')
        .then(response => {
            console.log(response)
            this.completed = response.data.completed
            // this.meta.current_page = response.data.completed.current_page
            // this.meta = response.data.completed
            
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
        this.completed = response.data.completed
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
