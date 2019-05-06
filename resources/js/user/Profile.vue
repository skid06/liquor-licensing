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
                      src="http://209.188.93.46/~lovesparkil/wp-content/uploads/2019/05/eli.jpg"
                      alt="Eli"
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
            <v-list-tile-title>Eli Nicolosi</v-list-tile-title>
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
      </v-layout>
    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn flat @click="menu = false">Cancel</v-btn>
      <v-btn color="primary" flat @click="menu = false">Save</v-btn>
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
      confirm_password_show: false
    }
  },

  methods: {
    chooseFile() {
      this.$refs.fileInput.click()
    },

    onFilePicked(event) {
      const files = event.target.files
      let filename = files[0].name

      if(filename.lastIndexOf('.') <= 0) {
        return alert('Please upload a valid file')
      }

      const fileReader = new FileReader()
      fileReader.readAsDataURL(files[0])

    },

		getUser(){
		 axios
				.get('/user/info')
				.then(response => {
					this.user = response.data
				})
		},

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
