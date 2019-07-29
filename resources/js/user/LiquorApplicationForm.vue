<template>
  <v-card>
    <v-card-title class="headline font-weight-regular white--text" style="background-color: #115c76">Liquor License Application</v-card-title>
    <v-card-text>
      <v-subheader class="pa-0 mr-5 ml-5"><h3>Business Information</h3></v-subheader>
      <v-layout row wrap class="mr-5 ml-5">
        <v-flex xs12 md12 >
          <v-text-field
            :value="id"
            v-show="false"
          ></v-text-field>
          <v-text-field
            v-model="business_name"
            v-validate="'required|min:3'"
            data-vv-name="business_name"
            :error-messages="errors.collect('business_name')"
            label="Business Name"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="business_address"
            v-validate="'required|min:3'"
            data-vv-name="business_address"
            :error-messages="errors.collect('business_address')"  
            append-icon="location_city"          
            label="Business Address"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md6 >
          <v-text-field
            v-model="business_city"
            v-validate="'required|min:3'"
            data-vv-name="business_city"
            :error-messages="errors.collect('business_city')"  
            append-icon="location_city"          
            label="Business City"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="business_state"
            v-validate="'required|min:3'"
            data-vv-name="business_state"
            :error-messages="errors.collect('business_state')"  
            append-icon="location_city"          
            label="Business State"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md6 >
          <v-text-field
            v-model="business_zip"
            v-validate="'required|min:3'"
            data-vv-name="business_zip"
            :error-messages="errors.collect('business_zip')"  
            append-icon="location_city"          
            label="Business Zip"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>                

        <v-flex xs12 md6 >
          <v-text-field
            v-model="business_phone"
            v-validate="'required|min:7'"
            data-vv-name="business_phone"
            :error-messages="errors.collect('business_phone')"             
            label="Business Phone"
            append-icon="phone"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="business_email"
            v-validate="'required|email'"
            append-icon="email"
            data-vv-name="business_email"
            :error-messages="errors.collect('business_email')"             
            label="Busines Email"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>         

        <v-flex xs12 md4 >
          <v-text-field
            v-model="business_contact_person"
            v-validate="'required|min:3'"
            data-vv-name="business_contact_person"
            :error-messages="errors.collect('business_contact_person')"            
            label="Contact Person"
            append-icon="person" 
            required
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4 >
          <v-text-field
            v-model="business_contact_title"
            v-validate="'required|min:3'"
            data-vv-name="business_contact_title"
            :error-messages="errors.collect('business_contact_title')"             
            label="Title"
            append-icon="title" 
            required
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4 >
          <v-text-field
            v-model="business_contact_phone"
            v-validate="'required|min:3'"
            data-vv-name="business_contact_phone"
            :error-messages="errors.collect('business_contact_phone')"              
            label="Phone"
            append-icon="phone"
            required
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>    

        <v-flex xs12 md12>
          <v-select
            :items="classifications"
            label="Business Classification"
            v-model="business_classification" 
            v-validate="'required'"
            :error-messages="errors.collect('business_classification')"
            data-vv-name="business_classification"
            id="inputBusinessClassification" 
            @change="selectClassification"
            outline
          ></v-select>
        </v-flex> 
      </v-layout>       

      <v-layout id="corporation-section" row wrap class="mr-5 ml-5" v-if="!hideCorporation">        
        <v-subheader class="pa-0"><h3>{{ business_classification }}</h3></v-subheader>
        <v-flex xs12 md12 >
          <v-text-field
            v-model="corporate_name"
            label="Corporate's Name"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="corporate_address"
            label="Corporate's Address"
            append-icon="location_city"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="corporate_city"
            label="Corporate's City"
            append-icon="location_city"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="corporate_state"
            label="Corporate's State"
            append-icon="location_city"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="corporate_zip"
            label="Corporate's Zip"
            append-icon="location_city"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>                 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_name"
            label="Store Manager"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_email"
            label="Store Manager's Email"
            class="input-width"
            append-icon="email"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_address"
            label="Store Manager's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_city"
            label="Store Manager's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_state"
            label="Store Manager's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_zip"
            label="Store Manager's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>                              

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_phone"
            label="Store Manager's Phone"
            append-icon="phone"
            class="input-width"
            outline
            ></v-text-field>
        </v-flex>    

        <v-subheader class="pa-0"><h5>Corporate officers must include President, Vice President, Secretary, and Treasurer, plus any party owning more than 5% stock or ownership of the business entity.</h5></v-subheader>  
       
        <v-flex xs12 md6 >
          <v-text-field
            v-model="president_name"
            label="President"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="president_email"
            label="President's Email"
            class="input-width"
            append-icon="email"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="president_address"
            label="President's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="president_city"
            label="President's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="president_state"
            label="President's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="president_zip"
            label="President's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>         

        <v-flex xs12 md12 >
          <v-text-field
            v-model="president_phone"
            label="President's Phone"
            append-icon="phone"
            class="input-width"
            outline
            style="width:48%"
            ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="vice_president_name"
            label="Vice President"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="vice_president_email"
            label="Vice President's Email"
            class="input-width"
            append-icon="email"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="vice_president_address"
            label="Vice President's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>  
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="vice_president_city"
            label="Vice President's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>  
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="vice_president_state"
            label="Vice President's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>  
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="vice_president_zip"
            label="Vice President's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>  
        </v-flex>                         

        <v-flex xs12 md12 >
          <v-text-field
            v-model="vice_president_phone"
            label="Vice President's Phone"
            append-icon="phone"
            class="input-width"
            outline
            style="width:48%"
            ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary_name"
            label="Secretary"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary_email"
            label="Secretary's Email"
            append-icon="email"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary_address"
            label="Secretary's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>                  
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary_city"
            label="Secretary's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>                  
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary_state"
            label="Secretary's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>                  
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary_zip"
            label="Secretary's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>                  
        </v-flex>                         

        <v-flex xs12 md12 >
          <v-text-field
            v-model="secretary_phone"
            label="Secretary's Phone"
            append-icon="phone"
            class="input-width"
            outline
            style="width:48%"
            ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer_name"
            label="Treasurer"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer_email"
            label="Treasurer's Email"
            append-icon="email"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer_address"
            label="Treasurer's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>            
        </v-flex>  
        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer_city"
            label="Treasurer's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>            
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer_state"
            label="Treasurer's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>            
        </v-flex>  
        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer_zip"
            label="Treasurer's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>            
        </v-flex>                          

        <v-flex xs12 md12 >
          <v-text-field
            v-model="treasurer_phone"
            label="Treasurer's Phone"
            append-icon="phone"
            class="input-width"
            outline
            style="width:48%"
            ></v-text-field>
        </v-flex>                                  
      </v-layout>  

      <v-layout row wrap class="mr-5 ml-5" v-if="!hideCorporation" v-for="shareholder in shareholders" :key="shareholder.id">
        <v-flex xs12 md6 >
          <v-text-field
            v-model="shareholder.name"
            label="Shareholder"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="shareholder.percentage_owned"
            label="Shareholder's Percentage Owned"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="shareholder.address"
            label="Shareholder's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>            
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="shareholder.city"
            label="Shareholder's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>            
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="shareholder.state"
            label="Shareholder's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>            
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="shareholder.zip"
            label="Shareholder's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>            
        </v-flex>                               
      </v-layout>   
      <v-btn
        @click="addShareHolder" 
        v-if="!hideCorporation"
        class="primary"
      ><v-icon dark>add_circle</v-icon>Shareholder</v-btn>  

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="!hideCorporation">
        <v-container fluid>  
          <p>Have you had a business within the City of Loves Park under any other corporate name?</p>
          <v-radio-group v-model="had_business_other_corporation" :mandatory="false" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>                   
        </v-container> 

        <v-flex xs12 md12 v-if="had_business_other_corporation == 'Yes'">
          <v-text-field
            v-model="other_corporate_name"
            label="Other Corporate's Name"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 v-if="had_business_other_corporation == 'Yes'">
          <v-text-field
            v-model="other_corporate_address"
            label="Other Corporate's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 
        <v-flex xs12 md6 v-if="had_business_other_corporation == 'Yes'">
          <v-text-field
            v-model="other_corporate_city"
            label="Other Corporate's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 v-if="had_business_other_corporation == 'Yes'">
          <v-text-field
            v-model="other_corporate_state"
            label="Other Corporate's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>    
        <v-flex xs12 md6 v-if="had_business_other_corporation == 'Yes'">
          <v-text-field
            v-model="other_corporate_zip"
            label="Other Corporate's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>               

        <v-flex xs12 md12 >
          <!-- <v-text-field
            v-model="date_qualified_transact_business"
            label="If state of incorporation is NOT Illinois, when was the corporation become qualified to transact business in Illinois?"
            class="input-width"
            outline
          ></v-text-field> -->
          <v-dialog
            ref="dialog"
            v-model="modal_date_qualified_transact_business"
            :return-value.sync="date_qualified_transact_business"
            persistent
            lazy
            full-width
            width="290px"
          >
            <template v-slot:activator="{ on }">
              <v-text-field
                v-model="date_qualified_transact_business"
                label="If state of incorporation is NOT Illinois, when was the corporation become qualified to transact business in Illinois?"
                append-icon="event"
                class="input-width"
                outline
                readonly
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker v-model="date_qualified_transact_business" scrollable>
              <v-spacer></v-spacer>
              <v-btn flat color="primary" @click="modal_date_qualified_transact_business = false">Cancel</v-btn>
              <v-btn flat color="primary" @click="$refs.dialog.save(date_qualified_transact_business)">OK</v-btn>
            </v-date-picker>
          </v-dialog>          
        </v-flex>                       
      </v-layout>   

      <v-layout id="llc-section" row wrap class="mr-5 ml-5" v-if="!hideLLC">        
        <v-subheader class="pa-0"><h3>{{ business_classification }}</h3></v-subheader>
        <v-flex xs12 md12 >
          <v-text-field
            v-model="state_of_organization"
            label="State of Organization"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 >
          <v-text-field
            v-model="llc_manager_name"
            label="LLC Manager"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="llc_manager_email"
            label="LLC Manager's Email"
            append-icon="email"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="llc_manager_phone"
            label="LLC Manager's Phone"
            append-icon="phone"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_name"
            label="Store Manager"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_email"
            label="Store Manager's Email"
            append-icon="email"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_address"
            label="Store Manager's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex>
        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_city"
            label="Store Manager's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_state"
            label="Store Manager's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex>
        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_zip"
            label="Store Manager's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex>                        

        <v-flex xs12 md12 >
          <v-text-field
            v-model="store_manager_phone"
            label="Store Manager's Phone"
            append-icon="phone"
            class="input-width"
            outline
            style="width:48%"
          ></v-text-field>
        </v-flex>                                 
      </v-layout>

      <v-layout id="llc-section" row wrap class="mr-5 ml-5" v-if="!hideLLC" v-for="member in members" :key="member.id"> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="member.id"
            label="Member ID"
            v-show="false"
            class="input-width"
            outline
          ></v-text-field>
          <v-text-field
            v-model="member.name"
            label="Member"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="member.email"
            label="Member's Email"
            class="input-width"
            append-icon="email"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="member.address"
            label="Member's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="member.city"
            label="Member's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex>  

        <v-flex xs12 md6 >
          <v-text-field
            v-model="member.state"
            label="Member's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="member.zip"
            label="Member's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex>                         

        <v-flex xs12 md12 >
          <v-text-field
            v-model="member.phone"
            label="Member's Phone"
            append-icon="phone"
            class="input-width"
            outline
            style="width:48%"
          ></v-text-field>
        </v-flex>                                
      </v-layout>   

      <v-btn
        @click="addMember" 
        v-if="!hideLLC"
        class="primary"
      ><v-icon dark>add_circle</v-icon>Member</v-btn>         

      <v-container v-if="!hidePartnership" class="pa-0 mr-5 ml-5">
        <v-subheader class="pa-0"><h3>{{ business_classification }}</h3></v-subheader>
      </v-container>

      <v-layout id="partnership-section" row wrap class="mr-5 ml-5" v-if="!hidePartnership" v-for="owner in owners" :key="owner.id"> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="owner.name"
            label="Owner"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="owner.percentage_owned"
            label="Owner's Percentage"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="owner.address"
            label="Owner's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex>
        <v-flex xs12 md6 >
          <v-text-field
            v-model="owner.city"
            label="Owner's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex>  

        <v-flex xs12 md6 >
          <v-text-field
            v-model="owner.state"
            label="Owner's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex>
        <v-flex xs12 md6 >
          <v-text-field
            v-model="owner.zip"
            label="Owner's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>          
        </v-flex>                        

        <v-flex xs12 md12 >
          <v-text-field
            v-model="owner.email"
            label="Owner's Email"
            class="input-width"
            append-icon="email"
            outline
            style="width:48%"
          ></v-text-field>
        </v-flex>
      </v-layout>   

      <v-btn
        @click="addOwner" 
        v-if="!hidePartnership"
        class="primary"
      ><v-icon dark>add_circle</v-icon> Ownership</v-btn>             

      <hr />
      <v-layout row wrap class="mr-5 ml-5 mt-30" v-if="!hideBusinessNotIncorporated">
        <v-flex xs12 md12>
          <v-select
            :items="bornOutsideUSoptions"
            label="Was the owner born outside the US?"
            id="inputBusinessClassification"
            v-model="born_outside_us"
            @change="checkBornOutsideUS"
            outline
          ></v-select>
        </v-flex>  
      </v-layout>   

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="born_outside_us == 'Yes'">  
        <v-container fluid> 
          <p>Born of US Parents?</p>
          <v-radio-group v-model="born_us_parents" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>        
        </v-container>           
      </v-layout>    

      <v-layout row wrap class="mr-5 ml-5" v-if="born_us_parents == 'Yes'">
        <v-flex xs12 md6 >
          <v-text-field
            v-model="birth_country"
            label="Birth Country"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-dialog
            ref="dialog2"
            v-model="modal_date_of_birth"
            :return-value.sync="date_of_birth"
            persistent
            lazy
            full-width
            width="290px"
          >
            <template v-slot:activator="{ on }">
              <v-text-field
                v-model="date_of_birth"
                label="Date of Birth"
                append-icon="event"
                class="input-width"
                outline
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker v-model="date_of_birth" scrollable>
              <v-spacer></v-spacer>
              <v-btn flat color="primary" @click="modal_date_of_birth = false">Cancel</v-btn>
              <v-btn flat color="primary" @click="$refs.dialog2.save(date_of_birth)">OK</v-btn>
            </v-date-picker>
          </v-dialog>           
          <!-- <v-text-field
            v-model="date_of_birth"
            label="Date of Birth"
            class="input-width"
            outline
          ></v-text-field> -->
        </v-flex> 
      </v-layout>  

      <v-layout row wrap class="mr-5 ml-5" v-if="born_us_parents == 'Yes'">  
        <v-flex xs12 md12 >
          <p>Naturalized?</p>
          <v-radio-group v-model="naturalized" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>          
        </v-flex> 
      </v-layout> 

      <v-layout row wrap class="mr-5 ml-5" v-if="born_us_parents == 'Yes' && naturalized == 'Yes'">
        <v-flex xs12 md4 >
          <v-text-field
            v-model="naturalized_city"
            label="City"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4 >
          <v-text-field
            v-model="naturalized_state"
            label="State"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>         

        <v-flex xs12 md4 >
          <v-dialog
            ref="dialog3"
            v-model="modal_naturalized_date"
            :return-value.sync="naturalized_date"
            persistent
            lazy
            full-width
            width="290px"
          >
            <template v-slot:activator="{ on }">
              <v-text-field
                v-model="naturalized_date"
                label="Date"
                append-icon="event"
                class="input-width"
                outline
                readonly
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker v-model="naturalized_date" scrollable>
              <v-spacer></v-spacer>
              <v-btn flat color="primary" @click="modal_naturalized_date = false">Cancel</v-btn>
              <v-btn flat color="primary" @click="$refs.dialog3.save(naturalized_date)">OK</v-btn>
            </v-date-picker>
          </v-dialog>  
        </v-flex>          
      </v-layout>       

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="establishmentSection">
        <v-flex xs12 md12 >
          <p>Does the owner of the liquor establishment lease the premises where business will be conducted?</p>
          <v-radio-group v-model="owner_lease_premises" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>          
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="establishment_owner_name"
            label="Owner's Name"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>       
        <v-flex xs12 md6 >
          <v-text-field
            v-model="establishment_owner_phone"
            label="Owner's Phone"
            append-icon="phone"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>   

        <v-flex xs12 md6 >
          <v-text-field
            v-model="establishment_owner_address"
            label="Owner's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="establishment_owner_city"
            label="Owner's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="establishment_owner_state"
            label="Owner's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="establishment_owner_zip"
            label="Owner's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>                               
      </v-layout> 

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="establishmentSection && owner_lease_premises == 'Yes'">
        <v-flex xs12 md6 >
          <v-text-field
            v-model="lessor_name"
            label="Lessor's Name"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>         
        <v-flex xs12 md6 >
          <v-text-field
            v-model="lessor_phone"
            label="Lessor's Phone"
            append-icon="phone"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>       

        <v-flex xs12 md6 >
          <v-text-field
            v-model="lessor_address"
            label="Lessor's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md6 >
          <v-text-field
            v-model="lessor_city"
            label="Lessor's City"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="lessor_state"
            label="Lessor's State"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md6 >
          <v-text-field
            v-model="lessor_zip"
            label="Lessor's Zip"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>        

        <v-flex xs12 md12 >
          <v-dialog
            ref="dialog4"
            v-model="modal_lessor_end_date"
            :return-value.sync="lessor_end_date"
            persistent
            lazy
            full-width
            width="290px"
            style="width:48%"
          >
            <template v-slot:activator="{ on }">
              <v-text-field
                v-model="lessor_end_date"
                label="Lease End Date"
                append-icon="event"
                class="input-width"
                outline
                readonly
                v-on="on"
                style="width:48%"
              ></v-text-field>
            </template>
            <v-date-picker v-model="lessor_end_date" scrollable>
              <v-spacer></v-spacer>
              <v-btn flat color="primary" @click="modal_lessor_end_date = false">Cancel</v-btn>
              <v-btn flat color="primary" @click="$refs.dialog4.save(lessor_end_date)">OK</v-btn>
            </v-date-picker>
          </v-dialog> 
        </v-flex>  

        <v-flex xs12 md12 >
          <div height="150" v-if="fileUrl">{{ current_lease }}</div>
          <v-text-field label="Upload Current Lease, if applicable" @click='chooseFile' v-model='current_lease' prepend-icon='attach_file'></v-text-field>
          <input
            type="file"
            style="display: none"
            ref="fileInput"
            @change="onFilePicked"
          >          
          <!-- <v-btn
            color="blue-grey"
            class="white--text"
            @click="chooseFile"
          >
            Upload Current Lease, if applicable
            <v-icon right dark>cloud_upload</v-icon>
          </v-btn>
          <input 
            type="file" 
            v-show="false" 
            ref="fileInput"
            id="current_lease"
            @change="onFilePicked"
          /> -->
        </v-flex>  
      
        <v-flex class="pt-20" xs12 md12>
          <p>Does the owner hold a liquor license at another premise?</p>
          <v-radio-group v-model="liquor_license_another_premise" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>          
        </v-flex>                                          
      </v-layout> 

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="liquor_license_another_premise == 'Yes'">
        <v-flex xs12 md12 >
          <v-text-field
            v-model="other_establishment_name"
            label="Name of other establishment"
            class="input-width"
            outline
            style="width:48%"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="other_establishment_address"
            label="Address of other establishment"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="other_establishment_city"
            label="City of other establishment"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>  

        <v-flex xs12 md6 >
          <v-text-field
            v-model="other_establishment_state"
            label="State of other establishment"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>  
        <v-flex xs12 md6 >
          <v-text-field
            v-model="other_establishment_zip"
            label="Zip of other establishment"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>                       
      </v-layout>  

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="establishmentSection">
        <v-flex xs12 md12 >
          <p>Is any action currently pending against business or owner for violation 
            of the Retailer's Occupation Tax Act of the State of Illinois?
          </p>
          <v-radio-group v-model="action_pending_against_owner" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>          
        </v-flex> 

        <v-flex xs12 md12 >
          <p>
            Has the owner or establishment been issued a federal
            wagering stamp?
          </p>
          <v-radio-group v-model="owner_been_issued_wagering_stamp" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>          
        </v-flex>  

        <v-flex xs12 md12 >
          <p>
            Since the last license issuance, has a previous liquor license held by
            the applying entity or any owner of more than 5% ownership interest been
            revoked by any state or subdivision thereof, or by the Federal Government?
          </p>
          <v-radio-group v-model="previous_liquor_license_been_revoked" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>          
        </v-flex>  

        <v-flex xs12 md12 >
          <p>
            <strong>When applying for a new liquor license, please note that there is
            a $250.00 non-refundable application fee. That fee is in addition
            to the liquor license itselft. This is a one time fee. This fee
            does not apply to renewal liquor licenses. The following is a listing
            of the current City of Loves Park liquor license fees revised 
            January 31, 2019. Please check which class you are applying for. - {{ class_fee }}</strong>
          </p>
          <v-radio-group 
            v-model="class_fee"
            v-validate="'required'"
            data-vv-name="class_fee"
            :error-messages="errors.collect('class_fee')"            
          >
            <div v-for="classType in classes" :key="classType.id">
              <v-radio
                :label="`${classType.type}: ${classType.description} - $${classType.cost}`"
                :value="classType.id"
              ></v-radio>
            </div>
          </v-radio-group>     
          <!-- {{class_fee}}                                                                                  -->
        </v-flex>                         
      </v-layout>          
      <v-btn
        @click="saveApplication()"
        class="primary"
        
      >Save</v-btn>

      <v-btn
        @click="saveApplication('city')"
        class="primary"
        color="#008FCD"
        
      >Submit to City</v-btn>                                                   
    </v-card-text>
    <v-snackbar v-model="isApplicationAdded" color="success">
      <span v-if="!app_id">You added a new application.</span>
      <span v-else>You edited your application.</span>
      <v-btn flat color="white">Close</v-btn>
    </v-snackbar>    
    <comment-box :app_id="id" :user_id="user_id" v-if="id != '' && status != 'saved'" />   
  </v-card>
</template>

<script>
  export default {
    $_veeValidate: {
      validator: 'new'
    },

    data () {
      return {
        business_name: '',
        business_address: '',
        business_city: '',
        business_state: '',
        business_zip: '',
        business_phone: '',
        business_email: '',
        business_classification: '',
        born_outside_us: '',
        born_us_parents: '',
        current_lease: '',
        date_of_birth: new Date().toISOString().substr(0, 10),
        date_qualified_transact_business: new Date().toISOString().substr(0, 10),
        naturalized_date: new Date().toISOString().substr(0, 10),
        lessor_end_date: new Date().toISOString().substr(0, 10),
        birth_country: '',   
        naturalized: "No",      
        naturalized_city: '',
        naturalized_state: '',              
        business_contact_person: '',
        business_contact_title: '',
        business_contact_phone: '',
        corporate_name: '',
        corporate_address: '',
        corporate_city: '',
        corporate_state: '',
        corporate_zip: '',
        store_manager_name: '',
        store_manager_email: '',
        store_manager_address: '',
        store_manager_city: '',
        store_manager_state: '',
        store_manager_zip: '',
        store_manager_phone: '',
        president_name: '',
        president_email: '',
        president_address: '',
        president_city: '',
        president_state: '',
        president_zip: '',
        president_phone: '', 
        vice_president_name: '',
        vice_president_email: '',
        vice_president_address: '',
        vice_president_city: '',
        vice_president_state: '',
        vice_president_zip: '',
        vice_president_phone: '',    
        secretary_name: '',
        secretary_email: '',
        secretary_address: '',
        secretary_city: '',
        secretary_state: '',
        secretary_zip: '',
        secretary_phone: '',  
        treasurer_name: '',
        treasurer_email: '',
        treasurer_address: '',
        treasurer_city: '',
        treasurer_state: '',
        treasurer_zip: '',
        treasurer_phone: '', 
        other_corporate_name: '',
        other_corporate_address: '',
        other_corporate_city: '',
        other_corporate_state: '',
        other_corporate_zip: '',   
        state_of_organization: '',
        llc_manager_name: '',
        llc_manager_email: '',
        llc_manager_phone: '',        
        had_business_other_corporation: '',            
        classifications: ['Corporation', 'Limited Liability Company', 'General Partnership', 'Limited Partnership', 'Sole Proprietorship'],
        bornOutsideUSoptions: ['Yes', 'No'],
        isEditing: false,
        model: null,
        selected_partnership: '',
        hideCorporation: true,
        hideLLC: true,
        hidePartnership: true,
        hideBusinessNotIncorporated: true,
        establishmentSection: false,
        establishment_owner_name: '',
        establishment_owner_address: '',
        establishment_owner_city: '',
        establishment_owner_state: '',
        establishment_owner_zip: '',
        establishment_owner_phone: '',
        lessor_name: '',
        lessor_address: '',
        lessor_city: '',
        lessor_state: '',
        lessor_zip: '',
        lessor_phone: '',       
        owner_lease_premises: '',
        liquor_license_another_premise : '',
        other_establishment_name: '',
        other_establishment_address: '',
        other_establishment_city: '',
        other_establishment_state: '',
        other_establishment_zip: '',
        action_pending_against_owner: '',
        owner_been_issued_wagering_stamp: '',
        previous_liquor_license_been_revoked: '',
        class_fee: null,
        classes: [],
        members: [
          { name: '', email: '', phone: '', address: '', city: '', state: '', zip: '' }
        ],
        shareholders: [
          { name: '', percentage_owned: '', address: '', city: '', state: '', zip: '' }
        ],
        owners: [
          { name: '', percentage_owned: '', email: '', address: '', city: '', state: '', zip: ''  }
        ],        
        states: [
          'Alabama', 'Alaska', 'American Samoa', 'Arizona',
          'Arkansas', 'California', 'Colorado', 'Connecticut',
          'Delaware', 'District of Columbia', 'Federated States of Micronesia',
          'Florida', 'Georgia', 'Guam', 'Hawaii', 'Idaho',
          'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky',
          'Louisiana', 'Maine', 'Marshall Islands', 'Maryland',
          'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi',
          'Missouri', 'Montana', 'Nebraska', 'Nevada',
          'New Hampshire', 'New Jersey', 'New Mexico', 'New York',
          'North Carolina', 'North Dakota', 'Northern Mariana Islands', 'Ohio',
          'Oklahoma', 'Oregon', 'Palau', 'Pennsylvania', 'Puerto Rico',
          'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee',
          'Texas', 'Utah', 'Vermont', 'Virgin Island', 'Virginia',
          'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
        ],
        date: new Date().toISOString().substr(0, 10),
        menu: false,
        modal_date_of_birth: false,
        modal_naturalized_date: false,
        modal_date_qualified_transact_business: false,
        modal_lessor_end_date: false,
        menu2: false,
        isApplicationAdded: false,
        app_id: '',
        status: '',
        userType: null,
        user_id: '',
        fileUrl: '',
        file: ''
      }
    },
    props: ['id'],
    methods: {
      saveApplication(submit) {
        this.$validator.validateAll()
          .then(result => {
            if(result){
              const config = {
                headers: { 'Content-Type': 'multipart/form-data' }
              }           

              let formData = new FormData()
              formData.append('app_id', this.app_id)
              formData.append('business_name', this.business_name)
              formData.append('business_address', this.business_address)
              formData.append('business_city', this.business_city)
              formData.append('business_state', this.business_state)
              formData.append('business_zip', this.business_zip)
              formData.append('business_phone', this.business_phone)
              formData.append('business_email', this.business_email)
              formData.append('business_classification', this.business_classification)
              formData.append('born_outside_us', this.born_outside_us)
              formData.append('born_us_parents', this.born_us_parents)
              formData.append('date_of_birth', this.date_of_birth)
              formData.append('birth_country', this.birth_country)
              formData.append('naturalized', this.naturalized)
              formData.append('naturalized_city', this.naturalized_city)
              formData.append('naturalized_state', this.naturalized_state)
              formData.append('naturalized_date', this.naturalized_date)
              formData.append('business_contact_person', this.business_contact_person)
              formData.append('business_contact_title', this.business_contact_title)
              formData.append('business_contact_phone', this.business_contact_phone)
              formData.append('corporate_name', this.corporate_name)
              formData.append('corporate_address', this.corporate_address)
              formData.append('corporate_city', this.corporate_city)
              formData.append('corporate_state', this.corporate_state)
              formData.append('corporate_zip', this.corporate_zip)
              formData.append('store_manager_name', this.store_manager_name)
              formData.append('store_manager_email', this.store_manager_email)
              formData.append('store_manager_address', this.store_manager_address)
              formData.append('store_manager_city', this.store_manager_city)
              formData.append('store_manager_state', this.store_manager_state)
              formData.append('store_manager_zip', this.store_manager_zip)
              formData.append('store_manager_phone', this.store_manager_phone)
              formData.append('president_name', this.president_name)
              formData.append('president_email', this.president_email)
              formData.append('president_address', this.president_address)
              formData.append('president_city', this.president_city)
              formData.append('president_state', this.president_state)
              formData.append('president_zip', this.president_zip)
              formData.append('president_phone', this.president_phone)
              formData.append('vice_president_name', this.vice_president_name)
              formData.append('vice_president_email', this.vice_president_email)
              formData.append('vice_president_address', this.vice_president_address)
              formData.append('vice_president_city', this.vice_president_city)
              formData.append('vice_president_state', this.vice_president_state)
              formData.append('vice_president_zip', this.vice_president_zip)
              formData.append('vice_president_phone', this.vice_president_phone)
              formData.append('secretary_name', this.secretary_name)
              formData.append('secretary_email', this.secretary_email)
              formData.append('secretary_address', this.secretary_address)
              formData.append('secretary_city', this.secretary_city)
              formData.append('secretary_state', this.secretary_state)
              formData.append('secretary_zip', this.secretary_zip)
              formData.append('secretary_phone', this.secretary_phone)
              formData.append('treasurer_name', this.treasurer_name)
              formData.append('treasurer_email', this.treasurer_email)
              formData.append('treasurer_address', this.treasurer_address)
              formData.append('treasurer_city', this.treasurer_city)
              formData.append('treasurer_state', this.treasurer_state)
              formData.append('treasurer_zip', this.treasurer_zip)
              formData.append('treasurer_phone', this.treasurer_phone)
              formData.append('other_corporate_name', this.other_corporate_name)
              formData.append('other_corporate_address', this.other_corporate_address)
              formData.append('other_corporate_city', this.other_corporate_city)
              formData.append('other_corporate_state', this.other_corporate_state)
              formData.append('other_corporate_zip', this.other_corporate_zip)
              formData.append('state_of_organization', this.state_of_organization)
              formData.append('llc_manager_name', this.llc_manager_name)
              formData.append('llc_manager_email', this.llc_manager_email)
              formData.append('llc_manager_phone', this.llc_manager_phone)
              formData.append('date_qualified_transact_business', this.date_qualified_transact_business)
              formData.append('had_business_other_corporation', this.had_business_other_corporation)
              formData.append('establishment_owner_name', this.establishment_owner_name)
              formData.append('establishment_owner_address', this.establishment_owner_address)
              formData.append('establishment_owner_city', this.establishment_owner_city)
              formData.append('establishment_owner_state', this.establishment_owner_state)
              formData.append('establishment_owner_zip', this.establishment_owner_zip)
              formData.append('establishment_owner_phone', this.establishment_owner_phone)
              formData.append('lessor_name', this.lessor_name)
              formData.append('lessor_address', this.lessor_address)
              formData.append('lessor_city', this.lessor_city)
              formData.append('lessor_state', this.lessor_state)
              formData.append('lessor_zip', this.lessor_zip)
              formData.append('lessor_phone', this.lessor_phone)
              formData.append('lessor_end_date', this.lessor_end_date)
              formData.append('owner_lease_premises', this.owner_lease_premises)
              formData.append('liquor_license_another_premise', this.liquor_license_another_premise)
              formData.append('other_establishment_name', this.other_establishment_name)
              formData.append('other_establishment_address', this.other_establishment_address)
              formData.append('other_establishment_city', this.other_establishment_city)
              formData.append('other_establishment_state', this.other_establishment_state)
              formData.append('other_establishment_zip', this.other_establishment_zip)
              formData.append('action_pending_against_owner', this.action_pending_against_owner)
              formData.append('owner_been_issued_wagering_stamp', this.owner_been_issued_wagering_stamp)   
              formData.append('previous_liquor_license_been_revoked', this.previous_liquor_license_been_revoked)
              formData.append('owners', JSON.stringify(this.owners))
              formData.append('shareholders', JSON.stringify(this.shareholders))
              formData.append('members', JSON.stringify(this.members))
              formData.append('class_fee', this.class_fee)
              formData.append('status', 'saved')
              // console.log(formData['members']);
              if(this.file){
                formData.append('current_lease', this.file, this.current_lease)
              }

              axios
                .post('/user/applications/store', formData, config)              
                .then(response => {
                  console.log(response)
                  if(submit == 'city'){
                    window.location.href = `/payment/${response.data.application.id}`
                  }
                  else{
                    this.isApplicationAdded = true
                    setTimeout(function(){ 
                      window.location.href = `/applications/saved`
                    }, 3000);
                  }
                })
                .catch()
                return
            }
            // else {
            //   alert('Correct them errors!');
            // }
          })
      },
      getApplicationById(id){
        axios
          .get(`/user/applications/id/${id}`)
          .then(response => {
            console.log(response.data)
            this.user_id = response.data.application.user_id
            this.app_id = id
            this.business_name = response.data.application.business_name
            this.business_address = response.data.application.business_address
            this.business_city = response.data.application.business_city
            this.business_state = response.data.application.business_state
            this.business_zip = response.data.application.business_zip
            this.business_phone = response.data.application.business_phone
            this.business_email = response.data.application.business_email
            this.business_contact_person = response.data.application.business_contact_person
            this.business_contact_phone = response.data.application.business_contact_phone
            this.business_contact_title = response.data.application.business_contact_title            
            this.business_classification = response.data.application.business_classification
            this.selectClassification(response.data.application.business_classification)   
            this.born_outside_us = response.data.application.born_outside_us
            this.born_us_parents = response.data.application.born_us_parents
            this.date_of_birth = response.data.application.date_of_birth
            this.birth_country = response.data.application.birth_country   
            this.naturalized = response.data.application.naturalized      
            this.naturalized_city = response.data.application.naturalized_city
            this.naturalized_state = response.data.application.naturalized_state
            this.naturalized_date = response.data.application.naturalized_date              
            this.business_contact_person = response.data.application.business_contact_person
            this.business_contact_title = response.data.application.business_contact_title
            this.business_contact_phone = response.data.application.business_contact_phone
            this.current_lease = response.data.application.current_lease
            this.class_fee = response.data.application.class_fee_id

            if(response.data.application.classifiable_type == 'App\\Corporation'){
              this.corporate_name = response.data.application.classifiable.corporate_name
              this.corporate_address = response.data.application.classifiable.corporate_address
              this.corporate_city = response.data.application.classifiable.corporate_city
              this.corporate_state = response.data.application.classifiable.corporate_state
              this.corporate_zip = response.data.application.classifiable.corporate_zip
              this.store_manager_name = response.data.application.classifiable.store_manager_name
              this.store_manager_email = response.data.application.classifiable.store_manager_email
              this.store_manager_address = response.data.application.classifiable.store_manager_address
              this.store_manager_city = response.data.application.classifiable.store_manager_city
              this.store_manager_state = response.data.application.classifiable.store_manager_state
              this.store_manager_zip = response.data.application.classifiable.store_manager_zip
              this.store_manager_phone = response.data.application.classifiable.store_manager_phone              
              this.president_name = response.data.application.classifiable.president_name
              this.president_email = response.data.application.classifiable.president_email
              this.president_address = response.data.application.classifiable.president_address
              this.president_city = response.data.application.classifiable.president_city
              this.president_state = response.data.application.classifiable.president_state
              this.president_zip = response.data.application.classifiable.president_zip
              this.president_phone = response.data.application.classifiable.president_phone
              this.vice_president_name = response.data.application.classifiable.vice_president_name
              this.vice_president_email = response.data.application.classifiable.vice_president_email
              this.vice_president_address = response.data.application.classifiable.vice_president_address
              this.vice_president_city = response.data.application.classifiable.vice_president_city
              this.vice_president_state = response.data.application.classifiable.vice_president_state
              this.vice_president_zip = response.data.application.classifiable.vice_president_zip
              this.vice_president_phone = response.data.application.classifiable.vice_president_phone
              this.secretary_name = response.data.application.classifiable.secretary_name
              this.secretary_email = response.data.application.classifiable.secretary_email
              this.secretary_address = response.data.application.classifiable.secretary_address
              this.secretary_city = response.data.application.classifiable.secretary_city
              this.secretary_state = response.data.application.classifiable.secretary_state
              this.secretary_zip = response.data.application.classifiable.secretary_zip
              this.secretary_phone = response.data.application.classifiable.secretary_phone
              this.treasurer_name = response.data.application.classifiable.treasurer_name
              this.treasurer_email = response.data.application.classifiable.treasurer_email
              this.treasurer_address = response.data.application.classifiable.treasurer_address
              this.treasurer_city = response.data.application.classifiable.treasurer_city
              this.treasurer_state = response.data.application.classifiable.treasurer_state
              this.treasurer_zip = response.data.application.classifiable.treasurer_zip
              this.treasurer_phone = response.data.application.classifiable.treasurer_phone
              this.shareholders = response.data.application.classifiable.children
            }
            else if(response.data.application.classifiable_type == 'App\\LimitedLiabilityCompany'){
              this.state_of_organization = response.data.application.classifiable.state_of_organization
              this.llc_manager_name = response.data.application.classifiable.llc_manager_name
              this.llc_manager_email = response.data.application.classifiable.llc_manager_email
              this.llc_manager_phone = response.data.application.classifiable.llc_manager_phone
              this.store_manager_name = response.data.application.classifiable.store_manager_name
              this.store_manager_email = response.data.application.classifiable.store_manager_email
              this.store_manager_address = response.data.application.classifiable.store_manager_address
              this.store_manager_city = response.data.application.classifiable.store_manager_city
              this.store_manager_state = response.data.application.classifiable.store_manager_state
              this.store_manager_zip = response.data.application.classifiable.store_manager_zip
              this.store_manager_phone = response.data.application.classifiable.store_manager_phone
              this.members = response.data.application.classifiable.children
                        
            } 
            else{            
              this.owners = response.data.application.classifiable.children  
            }
            this.other_corporate_name = response.data.application.classifiable.other_corporate_name
            this.other_corporate_address = response.data.application.classifiable.other_corporate_address
            this.other_corporate_city = response.data.application.classifiable.other_corporate_city
            this.other_corporate_state = response.data.application.classifiable.other_corporate_state
            this.other_corporate_zip = response.data.application.classifiable.other_corporate_zip

            this.date_qualified_transact_business = response.data.application.classifiable.date_qualified_transact_business
            this.had_business_other_corporation = response.data.application.classifiable.had_business_other_corporation
            this.establishment_owner_name = response.data.application.establishment_owner_name
            this.establishment_owner_address = response.data.application.establishment_owner_address
            this.establishment_owner_city = response.data.application.establishment_owner_city
            this.establishment_owner_state = response.data.application.establishment_owner_state
            this.establishment_owner_zip = response.data.application.establishment_owner_zip
            this.establishment_owner_phone = response.data.application.establishment_owner_phone
            this.lessor_name = response.data.application.lessor_name
            this.lessor_address = response.data.application.lessor_address
            this.lessor_city = response.data.application.lessor_city
            this.lessor_state = response.data.application.lessor_state
            this.lessor_zip = response.data.application.lessor_zip
            this.lessor_phone = response.data.application.lessor_phone
            this.lessor_end_date = response.data.application.lessor_end_date
            this.owner_lease_premises = response.data.application.owner_lease_premises
            this.liquor_license_another_premise  = response.data.application.liquor_license_another_premise
            this.other_establishment_name = response.data.application.other_establishment_name
            this.other_establishment_address = response.data.application.other_establishment_address
            this.other_establishment_city = response.data.application.other_establishment_city
            this.other_establishment_state = response.data.application.other_establishment_state
            this.other_establishment_zip = response.data.application.other_establishment_zip
            this.action_pending_against_owner = response.data.application.action_pending_against_owner
            this.owner_been_issued_wagering_stamp = response.data.application.owner_been_issued_wagering_stamp
            this.previous_liquor_license_been_revoked = response.data.application.previous_liquor_license_been_revoked
            this.status = response.data.application.status
          })
      },
      addMember() {
        // this.members.push({ id: this.members.length + 1, name: '', email: '', phone: '', address: '' })
        this.members.push({ name: '', email: '', phone: '', address: '', city: '', state: '', zip: ''  })
      },

      addShareHolder() {
        this.shareholders.push({ name: '', percentage_owned: '', address: '', city: '', state: '', zip: ''  })
      },

      addOwner() {
        this.owners.push({ name: '', percentage_owned: '', email: '', address: '', city: '', state: '', zip: ''  })
      },

      selectClassification(type) {
        if(type == 'Corporation') {
          this.hideCorporation = false
          this.hideLLC = true
          this.hidePartnership = true  
          this.hideBusinessNotIncorporated = false   
          this.establishmentSection = true
        }
        else if(type == 'Limited Liability Company') {
          this.hideCorporation = true
          this.hideLLC = false
          this.hidePartnership = true     
          this.hideBusinessNotIncorporated = false
          this.establishmentSection = true
        }
        else if(type == 'General Partnership' || type == 'Limited Partnership' || type == 'Sole Proprietorship') {
          this.hideCorporation = true
          this.hideLLC = true
          this.hidePartnership = false     
          this.hideBusinessNotIncorporated = false
          this.selected_partnership = type
          this.establishmentSection = true
        }      
      },

      checkBornOutsideUS(type) {
        if(type == 'Yes') {
          this.born_outside_us = 'Yes'   
          
        } 
        else {
          this.born_outside_us = 'No' 
          this.born_us_parents = false
        }     
      },

      getClasses(){
        axios.get('/class/fees')
          .then(response => this.classes = response.data)
      },

      chooseFile() {
        this.$refs.fileInput.click()
      },

      onFilePicked(event) {
        const files = event.target.files
        let filename = files[0].name
        this.file = files[0]
        this.current_lease = filename

        if(filename.lastIndexOf('.') <= 0) {
          return alert('Please upload a valid file')
        }

        const fileReader = new FileReader()
        fileReader.readAsDataURL(files[0])       

      },
      getUserType(){
        axios
          .get('/user/type')
          .then( (response) => this.userType = response.data.type)
      }
    },
    mounted(){
      if(this.id != ''){
        this.getApplicationById(this.id)
        this.getUserType()
      }
      this.getClasses()
      console.log(this.id)
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
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item>.list-datetime {
  text-align: right !important;
  float: right !important;
  width: 91px !important;
  font-size: 10px !important;
}
</style>
