<template>
  <!-- <v-form action="/login" method="POST"> -->
    <v-container fluid fill-height>
      <v-layout align-center justify-center>
        <v-flex xs10 md10>
          <v-card class="elevation-12">
            <v-toolbar dark color="primary">
              <v-toolbar-title>Complaint Form</v-toolbar-title>
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
              <v-form action="/login" method="POST" ref="form">
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

                <v-layout row wrap class="mr-3 ml-3">
                  <v-flex xs6 md6>
                    <v-text-field 
                      prepend-icon="person" 
                      name="violator_name" 
                      label="Violator Name" 
                      type="text" 
                      v-model="form.violator_name">
                    </v-text-field>

                    <v-text-field 
                      prepend-icon="mail" 
                      name="violator_email" 
                      label="Violator Email" 
                      type="text" 
                      v-model="form.violator_email">
                    </v-text-field>

                    <v-text-field 
                      prepend-icon="text_rotation_none" 
                      name="violator_address" 
                      label="Violator Address" 
                      type="text" 
                      v-model="form.violator_address">
                    </v-text-field>

                    <v-text-field 
                      prepend-icon="place" 
                      name="violator_city" 
                      label="Violator City" 
                      type="text" 
                      v-model="form.violator_city">                    
                    </v-text-field> 

                    <v-text-field 
                      prepend-icon="location_city" 
                      name="violator_state" 
                      label="Violator State" 
                      type="text" 
                      v-model="form.violator_state">  
                    </v-text-field>          

                    <v-text-field 
                      prepend-icon="label" 
                      name="violator_zip" 
                      label="Violator ZIP" 
                      type="text" 
                      v-model="form.violator_zip">
                    </v-text-field>   

                    <v-text-field 
                      prepend-icon="info" 
                      name="violator_pin" 
                      label="Violator Pin Code" 
                      type="text" 
                      v-model="form.violator_pin">  
                    </v-text-field>          

                    <v-text-field 
                      prepend-icon="dialpad" 
                      name="violator_ward_district_no" 
                      label="Violator Ward/Distric Number" 
                      type="text" 
                      v-model="form.violator_ward_district_no">
                    </v-text-field>    

                    <div v-for="violation_description in form.violation_descriptions" :key="violation_description.id">
                      <v-textarea outlined label="Description" v-model='violation_description.text'></v-textarea>  
                    </div>          

                    <v-btn
                      @click="addViolationDescription" 
                      class="primary"
                    ><v-icon dark>add_circle</v-icon> &nbsp; Description</v-btn>                              

                    <div v-for="violation_image in form.violation_images" :key="violation_image.id" class="mt-5">
                      <!-- <img :src="imageUrl" height="150" v-if="imageUrl"/> -->
                      <img :src="violation_image.url" height="150" v-if="violation_image.url"/>
                      <!-- <v-text-field label="Upload Photo" @click='pickFile' v-model='imageName' prepend-icon='image'></v-text-field> -->
                      <v-text-field label="Upload Photo" @click="pickFile(violation_image.id)" v-model='violation_image.name' prepend-icon='image'></v-text-field>
                      <input
                        type="file"
                        style="display: none"
                        ref="image"
                        accept="image/*"
                        @change="onFilePicked(violation_image.id)"
                      >  
                    </div> 

                    <v-btn
                      @click="addViolationImage" 
                      class="primary"
                    ><v-icon dark>add_circle</v-icon> &nbsp; Image</v-btn>                                                                                                         
                  </v-flex>                

                  <v-flex xs6 md6>
                    <v-text-field 
                      prepend-icon="person" 
                      name="complainant_name" 
                      label="Complainant Name" 
                      type="text" 
                      v-model="form.complainant_name">
                    </v-text-field>

                    <v-text-field 
                      prepend-icon="mail" 
                      name="complainant_email" 
                      label="Complainant Email" 
                      type="text" 
                      v-model="form.complainant_email">
                    </v-text-field>

                    <v-text-field 
                      prepend-icon="phone" 
                      name="complainant_phone" 
                      label="Complainant Phone" 
                      type="text" 
                      v-model="form.complainant_phone">
                    </v-text-field>     
                  </v-flex>                   
                </v-layout>                                         
              </v-form>
            </v-card-text>
            <v-card-actions class="ml-4">                          
              <v-btn color="primary" @click.prevent="submit">Submit</v-btn>
            </v-card-actions>

            <v-snackbar v-model="isApplicationAdded" color="success">
              <span>You have submitted a complaint. Officials will take a look on this complaint and will update you.</span>
              <v-btn flat color="white">Close</v-btn>
            </v-snackbar>  
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  <!-- </v-form> -->
</template>

<script>
  export default {
    data () {
      return {
        form: {
          complainant_name: '',
          complainant_email: '',
          complainant_phone: '',
          violator_name: '',
          violator_email: '',
          violator_address: '',
          violator_city: '',
          violator_state: '',
          violator_zip: '',    
          violator_pin: '',     
          violator_ward_district_no: '',
          violation_images: [
            {id: 0, url: '', file: '', name: ''}
          ],
          violation_descriptions: [
            {id: 0, text: ''}
          ]
        },
        isApplicationAdded: false,
        authError: '',
        imageName: '',
        imageUrl: '',
        imageFile: ''        
      }
    },
    methods: {
      pickFile (index) {
          this.$refs.image[index].click ()
      },
		
      onFilePicked (index) {
        
        const files = event.target.files
        if(files[0] !== undefined) {
          this.form.violation_images[index].name = files[0].name
          this.image = event.target.files[0]
          if(this.form.violation_images[index].name.lastIndexOf('.') <= 0) {
            return
          }
          const fr = new FileReader ()
          fr.readAsDataURL(files[0])
          fr.addEventListener('load', () => {
            this.form.violation_images[index].url = fr.result
            this.form.violation_images[index].file = files[0] // this is an image file that can be sent to server...
          })
        } else {
          this.form.violation_images[index].name = ''
          this.form.violation_images[index].file = ''
          this.form.violation_images[index].url = ''
        }
      },

      addViolationDescription() {
        this.form.violation_descriptions.push({ id: this.form.violation_descriptions.length, text: '' })
      },

      addViolationImage() {
        this.form.violation_images.push({ id: this.form.violation_images.length, url: '', file: '', name: '' })
      },      

      submit() {
        const config = {
          headers: { 'Content-Type': 'multipart/form-data' }
        }           

        let formData = new FormData()

        formData.append('complainant_name', this.form.complainant_name)
        formData.append('complainant_email', this.form.complainant_email)
        formData.append('complainant_phone', this.form.complainant_phone)
        formData.append('violator_name', this.form.violator_name)
        formData.append('violator_address', this.form.violator_address)
        formData.append('violator_city', this.form.violator_city)
        formData.append('violator_state', this.form.violator_state)
        formData.append('violator_zip', this.form.violator_zip)
        formData.append('violator_pin', this.form.violator_pin)
        formData.append('violator_ward_district_no', this.form.violator_ward_district_no)
        formData.append('violation_descriptions', JSON.stringify(this.form.violation_descriptions))


        if(this.form.violation_images){
          this.form.violation_images.forEach(image => {
            formData.append('violation_images[]', image.file, image.name)
          })
        }        

        // this.$store.dispatch('login')
        axios.post('/citizen/complaint/store', formData, config)
          .then(response => {
            console.log(response.data)   
            this.isApplicationAdded = true
            this.$refs.form.reset()
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
