<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8 col-md-offset-2">
              <div class="card">
                  <div class="card-header">My Applications</div>            
                  <div class="card-body">
                      <ul>
                          <li class="mb-10"><h3><a href="/home">Create New Application</a> </h3></li>   
                          <li class="mb-10"><h3><a href="/applications/incomplete">Saved Applications ({{ incomplete.length }})</a> </h3></li>                       
                          <li class="mb-10"><h3><a href="/applications/completed">Completed Applications ({{ completed.length }})</a> </h3></li>
                          <li class="mb-10"><h3><a href="/applications/processed">Processed Applications ({{ processed.length }})</a> </h3></li>
                          <!-- <li class="mb-10"><h3><a href="/applications/paid">Paid Applications ({{ paid.length }})</a> </h3></li> -->
                      </ul>                  
                  </div>
              </div>
          </div>
      </div>
  </div>  
</template>

<script>
import axios from 'axios'
export default {
  data(){
      return {
          paid: [],
          incomplete: [],
          completed: [],
          processed: []
      }
  },
  mounted(){
      this.getAllApplications()
  },
  methods: {
      getAllApplications(){
          axios
            .get('/user/applications/all')
            .then(response => {
                console.log(response)
                this.incomplete = response.data.incomplete
                this.completed = response.data.completed
                this.processed = response.data.processed
                this.paid = response.data.paid
                
            })
      }
  }
}
</script>