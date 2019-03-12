<template>
  <v-card>
    <v-card-title class="headline font-weight-regular blue-grey white--text">Liquor License Application</v-card-title>
    <v-card-text>
      <v-subheader class="pa-0 mr-5 ml-5"><h3>Business Information</h3></v-subheader>
      <v-layout row wrap class="mr-5 ml-5">
        <v-flex xs12 md12 >
          <v-text-field
            v-model="business.name"
            label="Business Name"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 >
          <v-text-field
            v-model="business.address"
            label="Business Address"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="business.phone"
            label="Business Phone"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="business.email"
            label="Busines Email"
            class="input-width"
          ></v-text-field>
        </v-flex>         

        <v-flex xs12 md4 >
          <v-text-field
            v-model="contact.person"
            label="Contact Person"
            required
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4 >
          <v-text-field
            v-model="contact.title"
            label="Title"
            required
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4 >
          <v-text-field
            v-model="contact.email"
            label="Phone"
            required
            class="input-width"
          ></v-text-field>
        </v-flex>    

        <v-flex xs12 md12>
          <v-select
            :items="classifications"
            label="Business Classification"
            v-model="business.classification" 
            id="inputBusinessClassification" 
            @change="activeClassification"
          ></v-select>
        </v-flex> 
      </v-layout>       

      <v-layout id="corporation-section" row wrap class="mr-5 ml-5" v-if="!hideCorporation">        
        <v-subheader class="pa-0"><h3>{{ business.classification }}</h3></v-subheader>
        <v-flex xs12 md12 >
          <v-text-field
            v-model="corporate.name"
            label="Corporate Name"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 >
          <v-text-field
            v-model="corporate.address"
            label="Corporate Address"
            class="input-width"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="storeManager.name"
            label="Store Manager"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="storeManager.email"
            label="Email"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="storeManager.phone"
            label="Phone"
            class="input-width"
            ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="storeManager.address"
            label="Address"
            class="input-width"
          ></v-text-field>
        </v-flex>       

        <v-subheader class="pa-0"><h5>Corporate officers must include President, Vice President, Secretary, and Treasurer, plus any party owning more than 5% stock or ownership of the business entity.</h5></v-subheader>  
       
        <v-flex xs12 md6 >
          <v-text-field
            v-model="president.name"
            label="President"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="president.email"
            label="Email"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="president.phone"
            label="Phone"
            class="input-width"
            ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="president.address"
            label="Address"
            class="input-width"
          ></v-text-field>
        </v-flex>  

        <v-flex xs12 md6 >
          <v-text-field
            v-model="vicePresident.name"
            label="Vice President"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="vicePresident.email"
            label="Vice President Email"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="vicePresident.phone"
            label="Vice President Phone"
            class="input-width"
            ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="vicePresident.address"
            label="Vice President Address"
            class="input-width"
          ></v-text-field>  
        </v-flex>  

        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary.name"
            label="Secretary"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary.email"
            label="Secretary Email"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary.phone"
            label="Secretary Phone"
            class="input-width"
            ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="secretary.address"
            label="Secretary Address"
            class="input-width"
          ></v-text-field>                  
        </v-flex>  

        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer.name"
            label="Treasurer"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer.email"
            label="Treasurer Email"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer.phone"
            label="Treasurer Phone"
            class="input-width"
            ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="treasurer.address"
            label="Treasurer Address"
            class="input-width"
          ></v-text-field>            
        </v-flex>                                    
      </v-layout>  

      <v-layout row wrap class="mr-5 ml-5" v-if="!hideCorporation" v-for="shareholder in shareholders" :key="shareholder.id">
        <v-flex xs12 md6 >
          <v-text-field
            v-model="shareholder.name"
            label="Shareholder"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="shareholder.percentage_owned"
            label="Shareholder Percentage Owned"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 >
          <v-text-field
            v-model="shareholder.address"
            label="Shareholder Address"
            class="input-width"
          ></v-text-field>            
        </v-flex>       
      </v-layout>   
      <v-btn
        @click="addShareHolder" 
        v-if="!hideCorporation"
      >Add Shareholder</v-btn>  

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="!hideCorporation">
        <v-container fluid>  
          <p>Have you had a business within the City of Loves Park under any other corporate name?</p>
          <v-radio-group v-model="had_business" :mandatory="false" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>                   
        </v-container> 

        <v-flex xs12 md12 >
          <v-text-field
            v-model="otherCorporate.name"
            label="Other Corporate Name"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 >
          <v-text-field
            v-model="otherCorporate.address"
            label="Other Corporate Address"
            class="input-width"
          ></v-text-field>
        </v-flex>  

        <v-flex xs12 md12 >
          <v-text-field
            v-model="state_of_incorporation"
            label="If state of incorporation is NOT Illinois, when was the corporation become qualified to transact business in Illinois?"
            class="input-width"
          ></v-text-field>
        </v-flex>                       
      </v-layout>   

      <v-layout id="llc-section" row wrap class="mr-5 ml-5" v-if="!hideLLC">        
        <v-subheader class="pa-0"><h3>{{ business.classification }}</h3></v-subheader>
        <v-flex xs12 md12 >
          <v-text-field
            v-model="state_of_organization"
            label="State of Organization"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md12 >
          <v-text-field
            v-model="llc_manager.name"
            label="LLC Manager"
            class="input-width"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="llc_manager.email"
            label="LLC Manager' Email"
            class="input-width"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="llc_manager.phone"
            label="LLC Manager's Phone"
            class="input-width"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager.name"
            label="Store Manager"
            class="input-width"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager.email"
            label="Store Manager's Email"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager.phone"
            label="Store Manager's Phone"
            class="input-width"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="store_manager.address"
            label="Store Manager's Address"
            class="input-width"
          ></v-text-field>          
        </v-flex>                                
      </v-layout>

      <v-layout id="llc-section" row wrap class="mr-5 ml-5" v-if="!hideLLC" v-for="member in members" :key="member.id"> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="member.name"
            label="Member"
            class="input-width"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="member.email"
            label="Member's Email"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="member.phone"
            label="Member's Phone"
            class="input-width"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="member.address"
            label="Member's Address"
            class="input-width"
          ></v-text-field>          
        </v-flex>                                
      </v-layout>   

      <v-btn
        @click="addMember" 
        v-if="!hideLLC"
      >Add Member</v-btn>         

      <v-container v-if="!hidePartnership" class="pa-0 mr-5 ml-5">
        <v-subheader class="pa-0"><h3>{{ business.classification }}</h3></v-subheader>
      </v-container>

      <v-layout id="partnership-section" row wrap class="mr-5 ml-5" v-if="!hidePartnership" v-for="owner in owners" :key="owner.id"> 
        <v-flex xs12 md6 >
          <v-text-field
            v-model="owner.name"
            label="Owner"
            class="input-width"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="owner.percentage"
            label="Owner's Percentage"
            class="input-width"
          ></v-text-field>
        </v-flex> 

        <v-flex xs12 md6 >
          <v-text-field
            v-model="owners.email"
            label="Owner's Email"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="owner.address"
            label="Owner's Address"
            class="input-width"
          ></v-text-field>          
        </v-flex>
      </v-layout>   

      <v-btn
        @click="addOwner" 
        v-if="!hidePartnership"
      >Add Ownership</v-btn>             

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="!hideBusinessNotIncorporated">
        <v-flex xs12 md12>
          <v-select
            :items="bornOutsideUSoptions"
            label="Was the owner born outside the US?"
            id="inputBusinessClassification" 
            @change="checkBornOutsideUS"
          ></v-select>
        </v-flex>  
      </v-layout>   

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="bornOutsideUS">  
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
            v-model="birth.country"
            label="Birth Country"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="birth.date"
            label="Date of Birth"
            class="input-width"
          ></v-text-field>
        </v-flex> 
      </v-layout>  

      <v-layout row wrap class="mr-5 ml-5" v-if="born_us_parents == 'Yes'">  
        <v-flex xs12 md12 >
          <p>Naturalized?</p>
          <v-radio-group v-model="isNaturalized" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>          
        </v-flex> 
      </v-layout> 

      <v-layout row wrap class="mr-5 ml-5" v-if="born_us_parents == 'Yes' && isNaturalized == 'Yes'">
        <v-flex xs12 md4 >
          <v-text-field
            v-model="naturalized.city"
            label="City"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4 >
          <v-text-field
            v-model="naturalized.state"
            label="State"
            class="input-width"
          ></v-text-field>
        </v-flex>         

        <v-flex xs12 md4 >
          <v-text-field
            v-model="naturalized.date"
            label="Date"
            class="input-width"
          ></v-text-field>
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
            v-model="establishment_owner.name"
            label="Owner's Name"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4 >
          <v-text-field
            v-model="establishment_owner.address"
            label="Owner's Address"
            class="input-width"
          ></v-text-field>
        </v-flex>         

        <v-flex xs12 md4 >
          <v-text-field
            v-model="establishment_owner.phone"
            label="Owner's Phone"
            class="input-width"
          ></v-text-field>
        </v-flex>        
      </v-layout> 

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="establishmentSection && owner_lease_premises == 'Yes'">
        <v-flex xs12 md6 >
          <v-text-field
            v-model="lessor.name"
            label="Lessor's Name"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="lessor.address"
            label="Lessor's Address"
            class="input-width"
          ></v-text-field>
        </v-flex>         

        <v-flex xs12 md6 >
          <v-text-field
            v-model="lessor.phone"
            label="Lessor's Phone"
            class="input-width"
          ></v-text-field>
        </v-flex>       

        <v-flex xs12 md6 >
          <v-text-field
            v-model="lessor.end_date"
            label="Lease End Date"
            class="input-width"
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
            @change="onFilePicked"
          />
        </v-flex>  
      
        <v-flex class="pt-20" xs12 md12>
          <p>Does the owner hold a liquor license at another premise?</p>
          <v-radio-group v-model="liquorLicense_anotherPremise" row>
            <v-radio label="Yes" value="Yes"></v-radio>
            <v-radio label="No" value="No"></v-radio>
          </v-radio-group>          
        </v-flex>                                          
      </v-layout> 

      <v-layout row wrap class="mr-5 ml-5 mt-10" v-if="liquorLicense_anotherPremise == 'Yes'">
        <v-flex xs12 md6 >
          <v-text-field
            v-model="otherEstablishment.name"
            label="Name of other establishment"
            class="input-width"
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md6 >
          <v-text-field
            v-model="otherEstablishment.address"
            label="Address of other establishment"
            class="input-width"
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
    </v-card-text>
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
        business:{
          name: '',
          address: '',
          phone: '',
          email: '',
          classification: ''
        },
        contact: {
          person: '',
          title: '',
          email: ''
        },
        corporate: {
          name: '',
          address: ''
        },
        storeManager: {
          name: '',
          email: '',
          address: '',
          phone: ''
        },
        president: {
          name: '',
          email: '',
          address: '',
          phone: ''
        }, 
        vicePresident: {
          name: '',
          email: '',
          address: '',
          phone: ''
        },    
        secretary: {
          name: '',
          email: '',
          address: '',
          phone: ''
        },  
        treasurer: {
          name: '',
          email: '',
          address: '',
          phone: ''
        }, 
        otherCorporate: {
          name: '',
          address: ''
        },   
        birth: {
          country: '',
          date: ''
        },  
        isNaturalized: "No",
        naturalized: {
          city: '',
          state: '',
          date: ''
        },
        state_of_organization: '',
        llc_manager: {
          name: '',
          email: '',
          phone: ''
        },
        store_manager: {
          name: '',
          email: '',
          phone: '',
          address: ''
        },        
        state_of_incorporation: '',
        had_business: '',
        born_us_parents: '',                   
        classifications: ['Corporation', 'Limited Liability Company', 'General Partnership', 'Limited Partnership', 'Sole Proprietorship'],
        bornOutsideUSoptions: ['Yes', 'No'],
        isEditing: false,
        model: null,
        selected_partnership: '',
        hideCorporation: true,
        hideLLC: true,
        hidePartnership: true,
        hideBusinessNotIncorporated: true,
        bornOutsideUS: false,
        establishmentSection: false,
        establishment_owner: {
          name: '',
          address: '',
          phone: ''
        },
        lessor: {
          name: '',
          address: '',
          phone: ''
        },        
        owner_lease_premises: '',
        liquorLicense_anotherPremise : '',
        otherEstablishment: {
          name: '',
          address: ''
        },
        action_pending_against_owner: '',
        owner_been_issued_wagering_stamp: '',
        previous_liquor_license_been_revoked: '',
        liquor_license_fee: [],
        members: [
          { id: 1, name: '', email: '', phone: '', address: '' }
        ],
        shareholders: [
          { id: 1, name: '', percentage_owned: '', address: '' }
        ],
        owners: [
          { id: 1, name: '', percentage: '', email: '', address: '' }
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
        ]
      }
    },
    methods: {
      addMember() {
        this.members.push({ id: this.members.length + 1, name: '', email: '', phone: '', address: '' })
      },

      addShareHolder() {
        this.shareholders.push({ id: '', name: '', percentage_owned: '', address: '' })
      },

      addOwner() {
        this.owners.push({ id: this.owners.length + 1, name: '', percentage: '', email: '', address: '' })
      },

      activeClassification(type) {
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
          this.bornOutsideUS = true   
          
        } 
        else {
          this.bornOutsideUS = false 
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

      }
    }    
  }
</script>

<style scoped>
.input-width{
 width: 95%;
}

</style>
