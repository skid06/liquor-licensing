<template>
  <v-card>
    <!-- <v-card-title class="headline font-weight-regular blue-grey white--text">Liquor License Application</v-card-title> -->
    <v-card-text>
      <v-snackbar v-model="paymentSuccess" top color="success">
        <span>{{ success_message }}</span>
        <v-btn flat color="white">Close</v-btn>
      </v-snackbar>      
      <v-subheader class="pa-0 mr-5 ml-5"><h3>Payment Form</h3></v-subheader>
      <v-layout row wrap class="mr-5 ml-5">
        <v-flex xs12 md12 >
          <v-text-field
            v-model="app_id"
            v-show="false"
          ></v-text-field>          
          <v-text-field
            v-model="email"
            v-validate="'required|email'"
            data-vv-name="email"
            :error-messages="errors.collect('email')"
            label="Email"
            class="input-width"
            
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 >
          <v-text-field
            v-model="name_on_card"
            v-validate="'required|min:3'"
            data-vv-name="name_on_card"
            :error-messages="errors.collect('name_on_card')"
            label="Name on Card"
            class="input-width"
            
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 >
          <v-text-field
            v-model="address"
            label="Address"
            class="input-width"
            
          ></v-text-field>
        </v-flex>                       

        <v-flex xs12 md4 >
          <v-text-field
            v-model="city"
            label="City"
            required
            class="input-width"
            
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4 >
          <v-text-field
            v-model="state"
            label="State"
            required
            class="input-width"
            
          ></v-text-field>
        </v-flex>  

        <v-flex xs12 md4 >
          <v-text-field
            v-model="zip"
            label="Zip"
            required
            class="input-width"
            
          ></v-text-field>
        </v-flex>        

        <v-flex xs12 md6 >
          <v-text-field
            v-model="country"
            label="Country"
            required
            class="input-width"
            
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="phone"
            label="Phone"
            required
            class="input-width"
            
          ></v-text-field>
        </v-flex>         

        <v-flex xs12 md12>
          <h3>Application Summary</h3>
          <strong>Business Name: </strong> {{ business_name }} <br>
          <strong>Address: </strong> {{ business_address }} <br>
          <strong>Phone: </strong> {{ business_phone }} <br>
          <strong>Email: </strong> {{ business_email }} <br>
          <strong>Contact Person: </strong> {{ business_contact_person }} <br>
          <strong>Contact Phone: </strong> {{ business_contact_phone }} <br>
          <strong>Contact Title: </strong> {{ business_contact_title }} <br>           
          <strong>Classification: </strong> {{ business_classification }} <br>
          <strong>Cost:</strong> ${{ cost }}
        </v-flex>
        <v-flex xs6 md6>
          <card-element></card-element>
          <input type="hidden" name="_token" :value="csrf">
        </v-flex> 
      </v-layout>            
      
      <v-btn
        @click="pay()"
        class="success"
      >Save</v-btn>                                                  
    </v-card-text>
  </v-card>
</template>

<script>
  import axios from 'axios'
  import { createToken, Card } from 'vue-stripe-elements-plus'
  export default {
    $_veeValidate: {
      validator: 'new'
    },

    data () {
      return {
        csrf: document.head.querySelector('meta[name="csrf-token"]').content,
        app_id: '',
        email: '',
        name_on_card: '',
        address: '',
        city: '',
        state: '',
        zip: '',
        country: '',
        phone: '',
        success_message: '',
        paymentSuccess: false,
        business_name: '',
        business_address: '',
        business_phone: '',
        business_email: '',
        business_contact_person: '',
        business_contact_phone: '',
        business_contact_title: '',           
        business_classification: '',
        cost: null       
      }
    },
    props: ['id'],
    methods: {
      pay () {
        // createToken returns a Promise which resolves in a result object with
        // either a token or an error key.
        // See https://stripe.com/docs/api#tokens for the token object.
        // See https://stripe.com/docs/api#errors for the error object.
        // More general https://stripe.com/docs/stripe.js#stripe-create-token.
        var options = {
          name: this.name_on_card,
        }
        createToken(options).then(result => {
          // var form = document.getElementById('payment-form');
          var hiddenInput = document.createElement('input');
          hiddenInput.setAttribute('type', 'hidden');
          hiddenInput.setAttribute('name', 'stripeToken');
          hiddenInput.setAttribute('value', result.token.id);
          this.$el.appendChild(hiddenInput);
          // Submit the form
          // this.$el.submit();
          
          axios.post('/checkout',{id: this.app_id, email: this.email, stripeToken: result.token.id, cost: this.cost})
              .then(response => {
                  console.log(response.data)
                  this.success_message = response.data.message
                  this.paymentSuccess = true
                  
                  setTimeout(function(){ 
                    window.location.href = `/applications/paid`
                  }, 3000);                  
              })
              .catch()
        })
      },

    getApplicationById(id){
      axios
        .get(`/user/applications/id/${id}`)
        .then(response => {
          console.log(response.data)
          this.business_name = response.data.application.business_name
          this.business_address = response.data.application.business_address
          this.business_phone = response.data.application.business_phone
          this.business_email = response.data.application.business_email
          this.business_contact_person = response.data.application.business_contact_person
          this.business_contact_phone = response.data.application.business_contact_phone
          this.business_contact_title = response.data.application.business_contact_title            
          this.business_classification = response.data.application.business_classification
        })
      },
      
      getCost(id){
        axios
          .get(`/application/cost/${id}`)
          .then(response => { 
            console.log('hey'+ response.data.cost)
            this.cost = response.data.cost
          })
      }
    },
    mounted(){
      this.app_id = this.id
      this.getApplicationById(this.app_id)
      this.getCost(this.app_id)
      console.log(this.app_id)
    }    
  }
</script>

<style scoped>
.input-width{
 width: 95%;
}
.v-btn{
  margin-left: 50px;
}
</style>
