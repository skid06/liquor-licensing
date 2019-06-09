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
            January 31, 2019. Please check which class you are applying for. - {{ class_fee }}</strong>
          </p>
          <v-radio-group 
            v-model="class_fee"
          >
            <div v-for="classType in classes" :key="classType.id">
              <v-radio
                :label="`${classType.type}: ${classType.description} - $${classType.cost}`"
                :value="classType.id"
              ></v-radio>
            </div>
          </v-radio-group>     
          {{class_fee}}                                                                                 
        </v-flex>                         
      </v-layout>                                                           
    </v-card-text>
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
        class_fee: null,
        classes: [],
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
    props: ['pdf'],
    methods: {
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
      this.getClasses()
      console.log(this.pdf)
    }    
  }
</script>

<style>
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

.v-toolbar, .v-footer, .v-navigation-drawer {
  display: none !important;
}
.container{
  margin-left: -150px !important;
}
</style>
