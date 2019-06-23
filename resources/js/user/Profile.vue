<template>
  <v-card style="width: 85%;">
    <v-card-title >
      <v-list>
        <v-list-tile avatar>
          <v-list-tile-avatar>
            <!-- <v-btn
              flat
              @click="chooseFile"
            >
              <v-avatar>
                <img
                  src="https://cdn.vuetifyjs.com/images/john.jpg"
                  alt="John"
                >
              </v-avatar>
            </v-btn> -->
            <v-tooltip bottom>
              <template v-slot:activator="{ on }">
                <v-btn
                  icon
                  dark
                  v-on="on"
                  @click="chooseFile"
                  class="show-overflow" 
                >
                  <v-avatar>
                    <img
                      :src="`storage/${user.image}`"
                      alt="Eli"
                      v-if="!previewImage"
                    >
                    <img
                      :src="previewImage"
                      alt="Eli"
                      v-else
                    >                    
                  </v-avatar>  
                </v-btn>     
              </template>
              <span>Change Profile image</span>
            </v-tooltip>                   
            <input 
              type="file" 
              v-show="false" 
              ref="fileInput"
              id="current_lease"
              @change="onFilePicked"
            />            
          </v-list-tile-avatar>

          <v-list-tile-content>
            <v-list-tile-title>{{ user.name }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-card-title>

    <v-divider class="mb-5"></v-divider>
      <v-layout align-center justify-center row wrap class="mt-5">
        <v-flex xs12 md10 offset-md1> 
          <v-text-field
            v-model="user.name"
            label="Name"
            outline
            append-icon="person"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md10 offset-md1 > 
          <v-text-field
            v-model="user.email"
            label="Email"
            outline
            append-icon="mail"
          ></v-text-field>
        </v-flex>  

        <v-flex xs12 md10 offset-md1 > 
          <v-text-field
            v-model="user.phone"
            label="Phone"
            outline
            append-icon="phone"
          ></v-text-field>
        </v-flex>          

        <v-flex xs12 md10 offset-md1 > 
          <v-text-field
            v-model="user.password"
            label="Password"
            :type="password_show ? 'text' : 'password'"
            outline
            :append-icon="password_show ? 'visibility' : 'visibility_off'"
            @click:append="password_show = !password_show"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md10 offset-md1 > 
          <v-text-field
            v-model="confirm_password"
            label="Confirm Password"
            :type="confirm_password_show ? 'text' : 'password'"
            outline
            :append-icon="confirm_password_show ? 'visibility' : 'visibility_off'"
            @click:append="confirm_password_show = !confirm_password_show"
          ></v-text-field>
        </v-flex>    

        <v-flex xs12 md10 offset-md1>
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
        </v-flex>                          
        <v-snackbar v-model="isUserEdited" color="success">
          <span>Successfully edited your info.</span>
          <v-btn flat color="white">Close</v-btn>
        </v-snackbar>         
      </v-layout>
    <v-card-actions>
      <v-spacer></v-spacer>
      <!-- <v-btn flat @click="menu = false">Cancel</v-btn> -->
      <v-btn color="primary" style="background-color: #ED2224 !important;" @click="editUser">Save</v-btn>     
    </v-card-actions>     
  </v-card>
</template>
<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  data(){
    return {
      user: {
        name: '',
        email: '',
        password: '',
        phone: ''
      },
      password_show: false,
      confirm_password: '',
      confirm_password_show: false,
      isUserEdited: false,
      filename: '',
      previewImage: '',
      files: {},
      image: null,
      authError: ''
    }
  },

  methods: {
    chooseFile() {
      this.$refs.fileInput.click()
    },

    onFilePicked(event) {
      console.log(event)
      this.files = event.target.files
      this.image = event.target.files[0]
      this.filename = this.files[0].name

      if(this.filename.lastIndexOf('.') <= 0) {
        return alert('Please upload a valid file')
      }

      const fileReader = new FileReader()
      fileReader.readAsDataURL(this.files[0])
      fileReader.onload = e =>{
          this.previewImage = e.target.result;
          console.log(this.previewImage);
      };
    },

		getUser(){
		 axios
				.get('/user/info')
				.then(response => {
					this.user = response.data
				})
    },
    
    editUser(){
      console.log(this.image)
      // return
      const config = {
        headers: { 'Content-Type': 'multipart/form-data' }
      }    

      let formData = new FormData()
      formData.append('name', this.user.name)
      formData.append('email', this.user.email)
      formData.append('phone', this.user.phone)
      formData.append('password', this.user.password)
      formData.append('confirm_password', this.confirm_password)

      if(this.image){
        formData.append('image', this.image, this.filename)
      }
      

      axios
        .post('/user/edit', formData, config)
        .then(response => {
          console.log(response.data)
          // this.user = response.data.user
          this.authError = ''
          this.isUserEdited = true
        })
        .catch(err => {
          // this.$store.commit("login_failed", 'Wrong email or password.')
          // this.authError = err.response.data.errors.email ? err.response.data.errors.email[0] : err.response.data.errors.password[0]
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
          else if(err.response.data.errors.confirm_password){
            this.authError = err.response.data.errors.confirm_password[0]
          }
          console.log(err.response.data.errors)
        })
    }

    // ...mapActions([
    //   'getUser'
    // ])
  },

  created(){
    this.getUser()
    // this.name = this.$store.state.user.email
    // this.userInfo
    // console.log(this.$store.state.user)
  }
}
</script>
