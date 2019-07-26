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
              <v-form>
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

                <v-alert
                  :value="true"
                  color="success"
                  icon="check"
                  outline
                  v-if="success"
                  class="mb-3"
                >
                  {{ success }}
                </v-alert>                                  
                <v-text-field 
                  prepend-icon="person" 
                  name="login" 
                  label="Email" 
                  type="text" 
                  v-model="form.email">
                </v-text-field>
              </v-form>
            </v-card-text>
            <v-card-actions>
              <div style="margin-left: 20px"><a href="/user/login">Login</a></div>
              <v-spacer></v-spacer>             
              <v-btn color="primary" @click.prevent="reset">Send Password Reset Link</v-btn>
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
          email: ''
        },
        authError: '',
        success: ''
      }
    },
    methods: {
      reset() {
      // this.$store.dispatch('login')
      axios.post('/password/email', this.form)
        .then(response => {
          console.log(response.data)
          this.authError = ''
          this.success = response.data.message
          // setAuthorization(response.data.access_token)
          // this.$store.commit("login_success", response.data)
          // this.$router.push({path: '/tasks'}) 
                 
        })
        .catch(err => {
          console.log(err)
          // this.$store.commit("login_failed", 'Wrong email or password.')
          this.success = ''
          if(err.response.status === 417){
            this.authError = err.response.data.email
            console.log(err.response)
          }          
          else if(err.response.status === 401){
            this.authError = err.response.data.message
            console.log(err.response)
          }
          else{
            // this.authError = err.response.data.email
            this.authError = err.response.data.errors.email ? err.response.data.errors.email[0] : err.response.data.errors.password[0]
            // console.log(err.response.data.errors.email ? err.response.data.errors.email[0] : err.response.data.errors.password[0])
          }

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
