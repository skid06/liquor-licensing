<template>
  <!-- <v-form action="/login" method="POST"> -->
    <v-container fluid fill-height>
      <v-layout align-center justify-center>
        <v-flex xs6>
          <v-card class="elevation-12">
            <v-toolbar dark color="primary">
              <v-toolbar-title>Reset Password</v-toolbar-title>
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
                  prepend-icon="mail" 
                  name="email" 
                  label="Email" 
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

                <v-text-field 
                  prepend-icon="lock" 
                  name="password" 
                  label="Confirm Password" 
                  id="confirm-password" 
                  type="password" 
                  v-model="form.password_confirmation">
                </v-text-field>                
              </v-form>
            </v-card-text>
            <v-card-actions>   
              <div style="margin-left: 20px"><a href="/user/login">Login</a></div>              
              <v-spacer></v-spacer>          
              <v-btn color="primary" @click.prevent="register">Reset</v-btn>
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
          password: '',
          password_confirmation: '',
          token: ''
        },
        authError: ''
      }
    },
    props: ['token', 'email'],
    methods: {
      register() {
      // this.$store.dispatch('login')
      axios.post('/password/reset', this.form)
        .then(response => {
          console.log(response.data)
          // setAuthorization(response.data.access_token)
          // this.$store.commit("login_success", response.data)
          // this.$router.push({path: '/tasks'}) 
          window.location = '/liquor-application'         
        })
        .catch(err => {
          // this.$store.commit("login_failed", 'Wrong email or password.')
          if(err.response.data.errors.name){
            this.authError = err.response.data.errors.name[0]
          }
          else if(err.response.data.errors.email){
            this.authError = err.response.data.errors.email[0]
          }
          else if(err.response.data.errors.password){
            this.authError = err.response.data.errors.password[0]
          }
          else if(err.response.data.errors.confirmed){
            this.authError = err.response.data.errors.confirmed[0]
          }          
          // this.authError = err.response.data.errors.email ? err.response.data.errors.email[0] : err.response.data.errors.password[0]
          console.log(err.response.data.errors.email ? err.response.data.errors.email[0] : err.response.data.errors.password[0])
        })
      }
    },
    computed: {
    },
    mounted(){
      console.log(this.token)
      this.form.token = this.token
      this.form.email = this.email
    }
  }
</script>

<style>
.error{
  text-align: center;
  color: black;
}
</style>
