<template>
  <!-- <v-form action="/login" method="POST"> -->
    <v-container fluid fill-height>
      <v-layout align-center justify-center>
        <v-flex xs6>
          <v-card class="elevation-12">
            <v-toolbar dark color="primary">
              <v-toolbar-title>Admin Login form</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-tooltip bottom>
                <v-btn
                  icon
                  large
                  
                  target="_blank"
                  slot="activator"
                >
                  <v-icon large>code</v-icon>
                </v-btn>
                <span>Source</span>
              </v-tooltip>
            </v-toolbar>
            <v-card-text>
              <v-form action="/login" method="POST">
                <v-alert
                  :value="true"
                  color="error"
                  icon="warning"
                  outline
                  v-if="authError"
                  class="mb-3"
                >
                  {{ authError }}
                </v-alert>                  
                <v-text-field 
                  prepend-icon="person" 
                  name="login" 
                  label="Login" 
                  type="text" 
                  v-model="form.email">
                </v-text-field>
                <v-text-field 
                  prepend-icon="lock" 
                  name="password" 
                  label="Password" 
                  id="password" 
                  type="password" 
                  v-model="form.password">
                </v-text-field>
              </v-form>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>             
              <v-btn color="primary" @click.prevent="authenticate">Login</v-btn>
            </v-card-actions>
 
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  <!-- </v-form> -->
</template>

<script>
// import {setAuthorization} from '../../services/route-checker'
// import { mapGetters } from 'vuex'
// import axios from 'axios'
  export default {
    data () {
      return {
        form: {
          email: '',
          password: ''
        },
        authError: ''
      }
    },
    methods: {
      authenticate() {
      // this.$store.dispatch('login')
      axios.post('/admin/login', this.form)
        .then(response => {
          console.log(response.data)
          // setAuthorization(response.data.access_token)
          // this.$store.commit("login_success", response.data)
          // this.$router.push({path: '/tasks'}) 
          window.location = '/dashboard'         
        })
        .catch(err => {
          // this.$store.commit("login_failed", 'Wrong email or password.')
          this.authError = err.response.data.errors.email ? err.response.data.errors.email[0] : err.response.data.errors.password[0]
          console.log(err.response.data.errors.email ? err.response.data.errors.email[0] : err.response.data.errors.password[0])
        })
      }
    },
    computed: {
    }
  }
</script>

<style>
.error{
  text-align: center;
  color: black;
}
</style>
