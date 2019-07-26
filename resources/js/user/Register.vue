<template>
  <!-- <v-form action="/login" method="POST"> -->
    <v-container fluid fill-height>
      <v-layout align-center justify-center>
        <v-flex xs6>
          <v-card class="elevation-12">
            <v-toolbar dark color="primary">
              <v-toolbar-title>Register</v-toolbar-title>
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

                <!-- <img :src="imageUrl" height="150" v-if="imageUrl"/>
                <v-text-field label="Select Avatar" @click='pickFile' v-model='imageName' prepend-icon='image'></v-text-field>
                <input
                  type="file"
                  style="display: none"
                  ref="image"
                  accept="image/*"
                  @change="onFilePicked"
                > -->

                <v-text-field 
                  prepend-icon="person" 
                  name="name" 
                  label="Name" 
                  type="text" 
                  v-model="form.name">
                </v-text-field>

                <v-text-field 
                  prepend-icon="mail" 
                  name="email" 
                  label="Email" 
                  type="text" 
                  v-model="form.email">
                </v-text-field>

                <v-text-field 
                  prepend-icon="phone" 
                  name="phone" 
                  label="Phone" 
                  type="text" 
                  v-model="form.phone">
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
                  v-model="form.confirmed">
                </v-text-field>                
              </v-form>
            </v-card-text>
            <v-card-actions>   
              <div style="margin-left: 20px"><a href="/password/reset">Forgot Password?</a></div>
              <div style="margin-left: 20px"><a href="/user/login">Login</a></div>              
              <v-spacer></v-spacer>          
              <v-btn color="primary" @click.prevent="register">Register</v-btn>
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
          name: '',
          email: '',
          phone: '',
          password: '',
          confirmed: ''
        },
        authError: '',
        imageName: '',
        imageUrl: '',
        imageFile: ''        
      }
    },
    methods: {
      pickFile () {
          this.$refs.image.click ()
      },
		
      onFilePicked (e) {
        const files = e.target.files
        if(files[0] !== undefined) {
          this.imageName = files[0].name
          this.image = e.target.files[0]
          if(this.imageName.lastIndexOf('.') <= 0) {
            return
          }
          const fr = new FileReader ()
          fr.readAsDataURL(files[0])
          fr.addEventListener('load', () => {
            this.imageUrl = fr.result
            this.imageFile = files[0] // this is an image file that can be sent to server...
          })
        } else {
          this.imageName = ''
          this.imageFile = ''
          this.imageUrl = ''
        }
      },

      register() {
        const config = {
          headers: { 'Content-Type': 'multipart/form-data' }
        }           

        let formData = new FormData()
        formData.append('name', this.form.name)
        formData.append('email', this.form.email)
        formData.append('phone', this.form.phone)
        formData.append('password', this.form.password)
        formData.append('confirmed', this.form.confirmed)

        if(this.image){
          formData.append('image', this.image, this.imageName)
        }

        // this.$store.dispatch('login')
        axios.post('/user/register', formData, config)
          .then(response => {
            console.log(response.data)
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
            else if(err.response.data.errors.phone){
              this.authError = err.response.data.errors.phone[0]
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
    }
  }
</script>

<style>
.error{
  text-align: center;
  color: black;
}
</style>
