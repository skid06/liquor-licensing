<template>
  <v-card>
    <v-card-title class="headline font-weight-regular blue-grey white--text">Liquor License Application</v-card-title>
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

        <v-flex xs12 md12 >
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
            label="Corporate Name"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 >
          <v-text-field
            v-model="corporate_address"
            label="Corporate Address"
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
            label="Email"
            class="input-width"
            append-icon="email"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_phone"
            label="Phone"
            append-icon="phone"
            class="input-width"
            outline
            ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager_address"
            label="Address"
            append-icon="location_city" 
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
            label="Email"
            class="input-width"
            append-icon="email"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="president_phone"
            label="Phone"
            append-icon="phone"
            class="input-width"
            outline
            ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="president_address"
            label="Address"
            append-icon="location_city" 
            class="input-width"
            outline
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
            label="Vice President Email"
            class="input-width"
            append-icon="email"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="vice_president_phone"
            label="Vice President Phone"
            append-icon="phone"
            class="input-width"
            outline
            ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="vice_president_address"
            label="Vice President Address"
            append-icon="location_city" 
            class="input-width"
            outline
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
            label="Secretary Email"
            append-icon="email"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary_phone"
            label="Secretary Phone"
            append-icon="phone"
            class="input-width"
            outline
            ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary_address"
            label="Secretary Address"
            append-icon="location_city" 
            class="input-width"
            outline
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
            label="Treasurer Email"
            append-icon="email"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer_phone"
            label="Treasurer Phone"
            append-icon="phone"
            class="input-width"
            outline
            ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer_address"
            label="Treasurer Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>            
        </v-flex>                                    
      </v-layout>  

      <v-layout row wrap class="mr-5 ml-5" v-if="!hideCorporation" v-for="shareholder in shareholders" :key="shareholder.name">
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
            label="Shareholder Percentage Owned"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 >
          <v-text-field
            v-model="shareholder.address"
            label="Shareholder Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>            
        </v-flex>       
      </v-layout>   
      <v-btn
        @click="addShareHolder" 
        v-if="!hideCorporation"
        class="success"
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
            label="Other Corporate Name"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 v-if="had_business_other_corporation == 'Yes'">
          <v-text-field
            v-model="other_corporate_address"
            label="Other Corporate Address"
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
            v-model="modal"
            :return-value.sync="date"
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
            <v-date-picker v-model="date" scrollable>
              <v-spacer></v-spacer>
              <v-btn flat color="primary" @click="modal = false">Cancel</v-btn>
              <v-btn flat color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
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
            label="LLC Manager' Email"
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
            v-model="store_manager_phone"
            label="Store Manager's Phone"
            append-icon="phone"
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
      </v-layout>

      <v-layout id="llc-section" row wrap class="mr-5 ml-5" v-if="!hideLLC" v-for="member in members" :key="member.name"> 
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
            v-model="member.phone"
            label="Member's Phone"
            append-icon="phone"
            class="input-width"
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
      </v-layout>   

      <v-btn
        @click="addMember" 
        v-if="!hideLLC"
        class="success"
      ><v-icon dark>add_circle</v-icon>Member</v-btn>         

      <v-container v-if="!hidePartnership" class="pa-0 mr-5 ml-5">
        <v-subheader class="pa-0"><h3>{{ business_classification }}</h3></v-subheader>
      </v-container>

      <v-layout id="partnership-section" row wrap class="mr-5 ml-5" v-if="!hidePartnership" v-for="owner in owners" :key="owner.name"> 
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
            v-model="owner.email"
            label="Owner's Email"
            class="input-width"
            append-icon="email"
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
      </v-layout>   

      <v-btn
        @click="addOwner" 
        v-if="!hidePartnership"
        class="success"
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
            ref="dialog"
            v-model="modal"
            :return-value.sync="date"
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
                readonly
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker v-model="date" scrollable>
              <v-spacer></v-spacer>
              <v-btn flat color="primary" @click="modal = false">Cancel</v-btn>
              <v-btn flat color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
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
            ref="dialog"
            v-model="modal"
            :return-value.sync="date"
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
            <v-date-picker v-model="date" scrollable>
              <v-spacer></v-spacer>
              <v-btn flat color="primary" @click="modal = false">Cancel</v-btn>
              <v-btn flat color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
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

        <v-flex xs12 md4 >
          <v-text-field
            v-model="establishment_owner_name"
            label="Owner's Name"
            append-icon="person" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4 >
          <v-text-field
            v-model="establishment_owner_address"
            label="Owner's Address"
            append-icon="location_city" 
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>         

        <v-flex xs12 md4 >
          <v-text-field
            v-model="establishment_owner_phone"
            label="Owner's Phone"
            append-icon="phone"
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
            v-model="lessor_address"
            label="Lessor's Address"
            append-icon="location_city" 
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
            v-model="lessor_end_date"
            label="Lease End Date"
            append-icon="event"
            class="input-width"
            outline
          ></v-text-field>
        </v-flex>  

        <v-flex xs12 md12 >
          <v-btn
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
          />
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
        <v-flex xs12 md6 >
          <v-text-field
            v-model="other_establishment_name"
            label="Name of other establishment"
            class="input-width"
            outline
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
            January 31, 2019. Please check which class you are applying for. - {{ liquor_license_fee }}</strong>
          </p>
          <v-radio-group 
            v-model="liquor_license_fee"
          >
            <v-radio  
              label="Class A - Tavern or Bar: $2,000.00" 
              value="Class A"
            ></v-radio>

            <v-radio  
              label="Class B - Retail sale of packaged alcoholic liquor not for consumption on premise: $1,500.00" 
              value="Class B"
            ></v-radio> 

            <v-radio  
              label="Class C - Clubs retail sale of alcoholic liquor for consumption on premise: $1,000.00" 
              value="Class C"
            ></v-radio> 
            
            <v-radio  
              label="Class D - Restaurants retail sale of beer and wine only for consumption on premise: $1,000.00" 
              value="Class D"
            ></v-radio>     

            <v-radio  
              label="Class E - Gas stations and Convenience stores retail sale of beer and wine only: $1,000.00" 
              value="Class E"
            ></v-radio>    

            <v-radio  
              label="Class F - Gaming Parlor: $2,000.00" 
              value="Class F"
            ></v-radio>    

            <v-radio  
              label="Class G - Temporary: $75.00 per day" 
              value="Class G"
            ></v-radio>

            <v-radio  
              label="Class H - Retail sale and consumption of alcoholic liquor in a banquet hall: $2,000.00" 
              value="Class H"
            ></v-radio>  

            <v-radio  
              label="Class R-1 - Restaurants retail sale of alcoholic liquor for consumption on premises: $2,000.00" 
              value="Class R-1"
            ></v-radio> 

            <v-radio  
              label="Class R-2 - Bowling and recreational facilities alcoholic liquors for consumption on premise: $2,000.00" 
              value="Class R-2"
            ></v-radio>      

            <v-radio  
              label="Class R-3 - Recreational facilities beer and wine for consumption on premise: $1,000.00" 
              value="Class R-3"
            ></v-radio>

            <v-radio  
              label="Class R-4 - Retail sale of beer and wine for consumption on premise of retail establishment: $1,000.00" 
              value="Class R-4"
            ></v-radio>    

            <v-radio  
              label="Class CTR - Catering business to provide and serve alcoholic liquor: $1,000.00" 
              value="Class CTR"
            ></v-radio>                                            
          </v-radio-group>                                                                                      
        </v-flex>                         
      </v-layout>          
      <v-btn
        @click="saveApplication()"
        class="primary"
      >Save</v-btn>

      <v-btn
        @click="saveApplication('city')"
        class="primary"
      >Submit to City</v-btn>                                                   
    </v-card-text>
    <v-snackbar v-model="isApplicationAdded" color="success">
      <span>You added a new application.</span>
      <v-btn flat color="white">Close</v-btn>
    </v-snackbar>    
    <comment-box :app_id="id" v-if="id != '' && status == 'paid'" />   
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
        business_phone: '',
        business_email: '',
        business_classification: '',
        born_outside_us: '',
        born_us_parents: '',
        date_of_birth: new Date().toISOString().substr(0, 10),
        birth_country: '',   
        naturalized: "No",      
        naturalized_city: '',
        naturalized_state: '',
        naturalized_date: '',              
        business_contact_person: '',
        business_contact_title: '',
        business_contact_phone: '',
        corporate_name: '',
        corporate_address: '',
        store_manager_name: '',
        store_manager_email: '',
        store_manager_address: '',
        store_manager_phone: '',
        president_name: '',
        president_email: '',
        president_address: '',
        president_phone: '', 
        vice_president_name: '',
        vice_president_email: '',
        vice_president_address: '',
        vice_president_phone: '',    
        secretary_name: '',
        secretary_email: '',
        secretary_address: '',
        secretary_phone: '',  
        treasurer_name: '',
        treasurer_email: '',
        treasurer_address: '',
        treasurer_phone: '', 
        other_corporate_name: '',
        other_corporate_address: '',   
        state_of_organization: '',
        llc_manager_name: '',
        llc_manager_email: '',
        llc_manager_phone: '',        
        date_qualified_transact_business: new Date().toISOString().substr(0, 10),
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
        establishment_owner_phone: '',
        lessor_name: '',
        lessor_address: '',
        lessor_phone: '',   
        lessor_end_date: '',     
        owner_lease_premises: '',
        liquor_license_another_premise : '',
        other_establishment_name: '',
        other_establishment_address: '',
        action_pending_against_owner: '',
        owner_been_issued_wagering_stamp: '',
        previous_liquor_license_been_revoked: '',
        liquor_license_fee: [],
        members: [
          { name: '', email: '', phone: '', address: '' }
        ],
        shareholders: [
          { name: '', percentage_owned: '', address: '' }
        ],
        owners: [
          { name: '', percentage_owned: '', email: '', address: '' }
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
        modal: false,
        menu2: false,
        isApplicationAdded: false,
        app_id: '',
        status: '',
        userType: null
      }
    },
    props: ['id'],
    methods: {
      saveApplication(submit) {
        this.$validator.validateAll()
          .then(result => {
            if(result){
              axios
                .post('/user/applications/store', {
                  app_id: this.id,
                  business_name: this.business_name,
                  business_address: this.business_address,
                  business_phone: this.business_phone,
                  business_email: this.business_email,
                  business_classification: this.business_classification,
                  born_outside_us: this.born_outside_us,
                  born_us_parents: this.born_us_parents,
                  date_of_birth: this.date_of_birth,
                  birth_country: this.birth_country,   
                  naturalized: this.naturalized,      
                  naturalized_city: this.naturalized_city,
                  naturalized_state: this.naturalized_state,
                  naturalized_date: this.naturalized_date,              
                  business_contact_person: this.business_contact_person,
                  business_contact_title: this.business_contact_title,
                  business_contact_phone: this.business_contact_phone,
                  corporate_name: this.corporate_name,
                  corporate_address: this.corporate_address,
                  store_manager_name: this.store_manager_name,
                  store_manager_email: this.store_manager_email,
                  store_manager_address: this.store_manager_address,
                  store_manager_phone: this.store_manager_phone,
                  president_name: this.president_name,
                  president_email: this.president_email,
                  president_address: this.president_address,
                  president_phone: this.president_phone,
                  vice_president_name: this.vice_president_name,
                  vice_president_email: this.vice_president_email,
                  vice_president_address: this.vice_president_address,
                  vice_president_phone: this.vice_president_phone,
                  secretary_name: this.secretary_name,
                  secretary_email: this.secretary_email,
                  secretary_address: this.secretary_address,
                  secretary_phone: this.secretary_phone,
                  treasurer_name: this.treasurer_name,
                  treasurer_email: this.treasurer_address,
                  treasurer_address: this.treasurer_address,
                  treasurer_phone: this.treasurer_phone,
                  other_corporate_name: this.other_corporate_name,
                  other_corporate_address: this.other_corporate_address,
                  state_of_organization: this.state_of_organization,
                  llc_manager_name: this.llc_manager_name,
                  llc_manager_email: this.llc_manager_email,
                  llc_manager_phone: this.llc_manager_phone,
                  date_qualified_transact_business: this.date_qualified_transact_business,
                  had_business_other_corporation: this.had_business_other_corporation,
                  establishment_owner_name: this.establishment_owner_name,
                  establishment_owner_address: this.establishment_owner_address,
                  establishment_owner_phone: this.establishment_owner_phone,
                  lessor_name: this.lessor_name,
                  lessor_address: this.lessor_address,
                  lessor_phone: this.lessor_phone,
                  lessor_end_date: this.lessor_end_date,
                  owner_lease_premises: this.owner_lease_premises,
                  liquor_license_another_premise : this.liquor_license_another_premise,
                  other_establishment_name: this.other_establishment_name,
                  other_establishment_address: this.other_establishment_address,
                  action_pending_against_owner: this.action_pending_against_owner,
                  owner_been_issued_wagering_stamp: this.owner_been_issued_wagering_stamp,
                  previous_liquor_license_been_revoked: this.previous_liquor_license_been_revoked,
                  owners: this.owners,
                  shareholders: this.shareholders,
                  members: this.members,
                  status: 'saved'
                })
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
            this.app_id = id
            this.business_name = response.data.application.business_name
            this.business_address = response.data.application.business_address
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

            if(response.data.application.classifiable_type == 'App\\Corporation'){
              this.corporate_name = response.data.application.classifiable.corporate_name
              this.corporate_address = response.data.application.classifiable.corporate_address
              this.store_manager_name = response.data.application.classifiable.store_manager_name
              this.store_manager_email = response.data.application.classifiable.store_manager_email
              this.store_manager_address = response.data.application.classifiable.store_manager_address
              this.store_manager_phone = response.data.application.classifiable.store_manager_phone              
              this.president_name = response.data.application.classifiable.president_name
              this.president_email = response.data.application.classifiable.president_email
              this.president_address = response.data.application.classifiable.president_address
              this.president_phone = response.data.application.classifiable.president_phone
              this.vice_president_name = response.data.application.classifiable.vice_president_name
              this.vice_president_email = response.data.application.classifiable.vice_president_email
              this.vice_president_address = response.data.application.classifiable.vice_president_address
              this.vice_president_phone = response.data.application.classifiable.vice_president_phone
              this.secretary_name = response.data.application.classifiable.secretary_name
              this.secretary_email = response.data.application.classifiable.secretary_email
              this.secretary_address = response.data.application.classifiable.secretary_address
              this.secretary_phone = response.data.application.classifiable.secretary_phone
              this.treasurer_name = response.data.application.classifiable.treasurer_name
              this.treasurer_email = response.data.application.classifiable.treasurer_address
              this.treasurer_address = response.data.application.classifiable.treasurer_address
              this.treasurer_phone = response.data.application.classifiable.treasurer_phone
              this.shareholders = response.data.application.classifiable.children
            }
            else if(response.data.application.classifiable_type == 'App\\Partnership'){
              this.state_of_organization = response.data.application.classifiable.state_of_organization
              this.llc_manager_name = response.data.application.classifiable.llc_manager_name
              this.llc_manager_email = response.data.application.classifiable.llc_manager_email
              this.llc_manager_phone = response.data.application.classifiable.llc_manager_phone
              this.store_manager_name = response.data.application.classifiable.store_manager_name
              this.store_manager_email = response.data.application.classifiable.store_manager_email
              this.store_manager_address = response.data.application.classifiable.store_manager_address
              this.store_manager_phone = response.data.application.classifiable.store_manager_phone
              this.owners = response.data.application.classifiable.children            
            } 
            else{
              this.state_of_organization = response.data.application.classifiable.state_of_organization
              this.llc_manager_name = response.data.application.classifiable.llc_manager_name
              this.llc_manager_email = response.data.application.classifiable.llc_manager_email
              this.llc_manager_phone = response.data.application.classifiable.llc_manager_phone
              this.store_manager_name = response.data.application.classifiable.store_manager_name
              this.store_manager_email = response.data.application.classifiable.store_manager_email
              this.store_manager_address = response.data.application.classifiable.store_manager_address
              this.store_manager_phone = response.data.application.classifiable.store_manager_phone              
              this.members = response.data.application.classifiable.children
            }
            this.other_corporate_name = response.data.application.other_corporate_name
            this.other_corporate_address = response.data.application.other_corporate_address

            this.date_qualified_transact_business = response.data.application.date_qualified_transact_business
            this.had_business_other_corporation = response.data.application.had_business_other_corporation
            this.establishment_owner_name = response.data.application.establishment_owner_name
            this.establishment_owner_address = response.data.application.establishment_owner_address
            this.establishment_owner_phone = response.data.application.establishment_owner_phone
            this.lessor_name = response.data.application.lessor_name
            this.lessor_address = response.data.application.lessor_address
            this.lessor_phone = response.data.application.lessor_phone
            this.lessor_end_date = response.data.application.lessor_end_date
            this.owner_lease_premises = response.data.application.owner_lease_premises
            this.liquor_license_another_premise  = response.data.application.liquor_license_another_premise
            this.other_establishment_name = response.data.application.other_establishment_name
            this.other_establishment_address = response.data.application.other_establishment_address
            this.action_pending_against_owner = response.data.application.action_pending_against_owner
            this.owner_been_issued_wagering_stamp = response.data.application.owner_been_issued_wagering_stamp
            this.previous_liquor_license_been_revoked = response.data.application.previous_liquor_license_been_revoked
            this.status = response.data.application.status
          })
      },
      addMember() {
        // this.members.push({ id: this.members.length + 1, name: '', email: '', phone: '', address: '' })
        this.members.push({ name: '', email: '', phone: '', address: '' })
      },

      addShareHolder() {
        this.shareholders.push({ name: '', percentage_owned: '', address: '' })
      },

      addOwner() {
        this.owners.push({ name: '', percentage_owned: '', email: '', address: '' })
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
