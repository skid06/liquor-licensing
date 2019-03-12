<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
              <div style="margin-left:100px">
                <h4>
                  <i class="fa fa-globe"></i> CORPORATE FORM <br />
                  APPLICATION FOR CITY RETAILER’S LICENSE TO SELL ALCOHOLIC LIQUORS
                </h4>
              </div>
              <form>
              <!-- <div :class="{hide: isHide, 'alert': true, 'alert-success': true}">
                  This application has been saved.
              </div> -->
                <fieldset class="fieldset">  
                  <legend class="legend">Business Informations</legend>              
                  <div class="form-group">
                    <label for="inputBusiness">Business Name</label>
                    <input type="text" class="form-control" v-model="business_name" id="inputBusiness" placeholder="Business Name">
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Business Address</label>
                    <input type="text" class="form-control" v-model="address" id="inputAddress" placeholder="1234 Main St">
                    <input type="hidden" class="form-control" v-model="app_id" id="app_id">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputBusinessPhone">Business Phone</label>
                      <input type="text" class="form-control" v-model="business_phone" id="inputBusinessPhone" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputBusinessEmail">Business Email</label>
                      <input type="text" class="form-control" v-model="business_email" id="inputBusinessEmail" placeholder="">
                    </div>    
                  </div>              
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputBusinessContactPerson">Contact Person</label>
                      <input type="text" class="form-control" v-model="business_contact_person" id="inputBusinessContactPerson" placeholder="">
                    </div>  
                    <div class="form-group col-md-4">
                      <label for="inputBusinessContactTitle">Title</label>
                      <input type="text" class="form-control" v-model="business_contact_title" id="inputBusinessContactTitle"> 
                    </div> 
                    <div class="form-group col-md-4">
                      <label for="inputBusinessContactPhone">Phone</label>
                      <input type="text" class="form-control" v-model="business_contact_phone" id="inputBusinessContactPhone"> 
                    </div>   
                  </div>    
                  <div class="form-group">
                    <label for="inputBusinessClassification">Business Classification</label>
                    <select class="form-control" v-model="business_classification" id="inputBusinessClassification" @change="activeClassification($event)">
                      <option value="">Select</option>
                      <option value="Corporation">Corporation</option>
                      <option value="Limited Liability Company">Limited Liability Company</option>
                      <option value="General Partnership">General Partnership</option>
                      <option value="Limited Partnership">Limited Partnership</option>
                      <option value="Sole Proprietorship">Sole Proprietorship</option>
                    </select>
                  </div>                                  
                </fieldset>
                <fieldset class="fieldset" id="corporation" v-if="!hideCorporation">  
                  <legend class="legend">Corporation</legend>  
                  <div class="form-group">
                    <label for="inputCorporate">Corporate Name</label>
                    <input type="text" class="form-control" v-model="corporate_name" id="inputCorporate" placeholder="Business Name">
                  </div>
                  <div class="form-group">
                    <label for="inputCorporateAddress">Corporation Address</label>
                    <input type="text" class="form-control" v-model="corporation_address" id="inputCorporateAddress" placeholder="1234 Main St">
                    <input type="hidden" class="form-control" v-model="app_id" id="app_id">
                  </div>         
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputStoreManager">Store Manager</label>
                      <input type="text" class="form-control" v-model="store_manager" id="inputStoreManager" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputStoreEmail">Email</label>
                      <input type="text" class="form-control" v-model="store_manager_email" id="inputStoreEmail" placeholder="johndoe@test.com">
                    </div>    
                  </div>  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputStoreManagerPhone">Phone</label>
                      <input type="text" class="form-control" v-model="store_manager_phone" id="inputStoreManagerPhone" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputStoreManagerAddress">Address</label>
                      <input type="text" class="form-control" v-model="store_manager_address" id="inputStoreManagerAddress" placeholder="1234 Main St">
                    </div>    
                  </div>    
                  <div class="form-group">
                    <p>
                      <strong>
                        Corporate officers must include President, Vice President, Secretary, and Treasurer, plus any party
                        owning more than 5% stock or ownership of the business entity.
                      </strong>                                 
                    </p> 
                  </div>   
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputPresident">President</label>
                      <input type="text" class="form-control" v-model="president" id="inputPresident" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPresidentEmail">Email</label>
                      <input type="text" class="form-control" v-model="president_email" id="inputPresidentEmail" placeholder="johndoe@test.com">
                    </div>    
                  </div>  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputPresidentPhone">Phone</label>
                      <input type="text" class="form-control" v-model="president_phone" id="inputPresidentPhone" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPresidentAddress">Address</label>
                      <input type="text" class="form-control" v-model="president_address" id="inputPresidentAddress" placeholder="1234 Main St">
                    </div>    
                  </div>  
                  <hr>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputVicePresident">Vice President</label>
                      <input type="text" class="form-control" v-model="vice_president" id="inputVicePresident" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputVicePresidentEmail">Email</label>
                      <input type="text" class="form-control" v-model="vice_president_email" id="inputVicePresidentEmail" placeholder="johndoe@test.com">
                    </div>    
                  </div>  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputVicePresidentPhone">Phone</label>
                      <input type="text" class="form-control" v-model="vice_president_phone" id="inputVicePresidentPhone" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputVicePresidentAddress">Address</label>
                      <input type="text" class="form-control" v-model="vice_president_address" id="inputVicePresidentAddress" placeholder="1234 Main St">
                    </div>    
                  </div> 
                  <hr>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputSecretary">Secretary</label>
                      <input type="text" class="form-control" v-model="secretary" id="inputSecretary" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputSecretaryEmail">Email</label>
                      <input type="text" class="form-control" v-model="secretary_email" id="inputSecretaryEmail" placeholder="johndoe@test.com">
                    </div>    
                  </div>  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputSecretaryPhone">Phone</label>
                      <input type="text" class="form-control" v-model="secretary_phone" id="inputSecretaryPhone" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputSecretaryAddress">Address</label>
                      <input type="text" class="form-control" v-model="secretary_address" id="inputSecretaryAddress" placeholder="1234 Main St">
                    </div>    
                  </div>    
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputTreasurer">Treasurer</label>
                      <input type="text" class="form-control" v-model="treasurer" id="inputTreasurer" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputTreasurerEmail">Email</label>
                      <input type="text" class="form-control" v-model="treasurer_email" id="inputTreasurerEmail" placeholder="johndoe@test.com">
                    </div>    
                  </div>  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputTreasurerPhone">Phone</label>
                      <input type="text" class="form-control" v-model="treasurer_phone" id="inputTreasurerPhone" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputTreasurerAddress">Address</label>
                      <input type="text" class="form-control" v-model="treasurer_address" id="inputTreasurerAddress" placeholder="1234 Main St">
                    </div>    
                  </div>  
                  <div v-for="shareholder in shareholders" :key="shareholder.id">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputShareholder">Shareholder</label>
                        <input type="text" class="form-control" v-model="shareholder.name" id="inputShareholder" placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPercentageOwned">Percentage Owned</label>
                        <input type="text" class="form-control" v-model="shareholder.email" id="inputTrePercentageOwned" placeholder="i.e: 10%">
                      </div>    
                    </div>  
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputTreasurerAddress">Address</label>
                        <input type="text" class="form-control" v-model="shareholder.address" id="inputTreasurerAddress" placeholder="1234 Main St">
                      </div>    
                    </div>  
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <input type="button" class="" @click="addShareHolder" value="Add Shareholder">
                    </div>    
                  </div>   
                  <div class="form-group">
                    <label for="inputCorporate">Have you had a business within the City of Loves Park under any other corporate name</label>
                    <input type="radio" class="form-control" v-model="had_business" id="inputCorporate" value="Yes"> Yes
                    <input type="radio" class="form-control" v-model="had_business" id="inputCorporate" value="No"> No
                  </div>       
                  <div class="form-group">
                    <label for="name">Corporate Name</label>
                    <input type="text" class="form-control" v-model="corporate_name" id="corporate-name"> 
                  </div>  
                  <div class="form-group">
                    <p>
                      <strong>
                        If yes,
                      </strong>                                 
                    </p> 
                  </div>                     
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" v-model="corporate_name" id="corporate-name"> 
                  </div>    
                  <div class="form-group">
                    <label for="corporate-address">Address</label>
                    <input type="text" class="form-control" v-model="corporate_address" id="corporate-address" placeholder="1234 Main St">
                  </div> 
                  <div class="form-group">
                    <label for="corporate-address">If state of incorporation is NOT Illinois, when was the corporation become qualified to transact business in Illinois</label>
                    <input type="date" class="form-control" v-model="corporate_address" id="corporate-address" placeholder="">
                  </div>                                                                                                                                                                                              
                </fieldset> 
                <fieldset class="fieldset" id="corporation" v-if="!hideLLC">  
                  <legend class="legend">Limited Liability Company</legend> 
                  <div class="form-group">
                    <label for="stateOfOrganization">State of Organization</label>
                    <input type="text" class="form-control" v-model="state_of_organization" id="stateOfOrganization" placeholder="">
                  </div> 
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputLLCManager">LLC Manager</label>
                      <input type="text" class="form-control" v-model="llc_manager" id="inputLLCManager" placeholder="">
                    </div>    
                  </div> 
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputLLCManagerEmail">Email</label>
                      <input type="text" class="form-control" v-model="llc_manager_email" id="inputLLCManagerEmail" placeholder="johndoe@test.com">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputLLCManagerPhone">Phone</label>
                      <input type="text" class="form-control" v-model="llc_manager_phone" id="inputLLCManagerPhone" placeholder="">
                    </div>    
                  </div>   
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputStoreManager">Store Manager</label>
                      <input type="text" class="form-control" v-model="llc_store_manager" id="inputStoreManager" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputStoreManagerEmail">Email</label>
                      <input type="text" class="form-control" v-model="llc_store_manager_email" id="inputStoreManagerEmail" placeholder="johndoe@test.com">
                    </div>    
                  </div>  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputStoreManagerPhone">Phone</label>
                      <input type="text" class="form-control" v-model="llc_store_manager_phone" id="inputStoreManagerPhone" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputStoreManagerAddress">Address</label>
                      <input type="text" class="form-control" v-model="llc_member_address" id="inputStoreManagerAddress" placeholder="1234 Main St">
                    </div>    
                  </div> 
                  <div v-for="member in members" :key="member.id">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputLLCMember">Member {{ member.id }}</label>
                        <input type="text" class="form-control" v-model="member.name" id="inputLLCMember" placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputLLCMemberEmail">Email</label>
                        <input type="text" class="form-control" v-model="member.email" id="inputLLCMemberEmail" placeholder="johndoe@test.com">
                      </div>    
                    </div>  
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputLLCMemberPhone">Phone</label>
                        <input type="text" class="form-control" v-model="member.phone" id="inputLLCMemberPhone" placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputLLCMemberAddress">Address</label>
                        <input type="text" class="form-control" v-model="member.address" id="inputLLCMemberAddress" placeholder="1234 Main St">
                      </div>    
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <input type="button" class="" @click="addMember" value="Add Member">
                    </div>    
                  </div> 
                  <div class="form-group">
                    <p><strong>
                      All managers must have background checks on file with the Liquor Commision's office. New managers must contact 
                      the Regional Board of Education (815) 636-3060 to schedule an appointment.
                    </strong></p> 
                  </div>                                                                                                         
                </fieldset>  
                <fieldset class="fieldset" v-if="!hidePartnership">  
                  <legend class="legend"> {{ selected_partnership }} </legend> 
                  <div v-for="owner in owners" :key="owner.id">
                    <hr />
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputOwner">Owner</label>
                        <input type="text" class="form-control" v-model="owner.name" id="inputOwner" placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPercentageOwner">Percentage Owned</label>
                        <input type="text" class="form-control" v-model="owner.percentage" id="inputTrePercentageOwner" placeholder="i.e: 10%">
                      </div>    
                    </div>  
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputOwnerAddress">Address</label>
                        <input type="text" class="form-control" v-model="owner.address" id="inputOwnerAddress" placeholder="1234 Main St">
                      </div>   
                      <div class="form-group col-md-6">
                        <label for="inputOwnerEmail">Email</label>
                        <input type="text" class="form-control" v-model="owner.email" id="inputOwnerEmail" placeholder="1234 Main St">
                      </div>                          
                    </div>  
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <input type="button" class="" @click="addOwner" value="Add Owner">
                    </div>    
                  </div>                     
                </fieldset>    
                <fieldset class="fieldset" v-if="!hideBusinessNotIncorporated">
                  <legend class="legend"> If the business is not incorporated by the City Ordinance, the owner must reside within City of Loves Park. </legend>    
                  <div class="form-group">
                    <label for="bornOutsideUS">Was the owner born outside the US?</label>
                    <select class="form-control" v-model="business_classification" id="bornOutsideUS" @change="checkBornOutsideUS($event)">
                      <option value="">Select</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                  <div v-if="bornOutsideUS">
                    <div class="form-group">
                      <label for="bornUSParent">Born of US Parents?</label>
                      <select class="form-control" v-model="business_classification" id="bornUSParent">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>  
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="birthCountry">Birth Country</label>
                        <input type="text" class="form-control" v-model="birth_country" id="birthCountry" placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPercentageOwner">Date of Birth</label>
                        <input type="date" class="form-control" v-model="date_of_birth" id="inputTrePercentageOwner" placeholder="">
                      </div>    
                    </div>  
                    <div class="form-group">
                      <label for="naturalized">Naturalized?</label>
                      <select class="form-control" v-model="naturalized" id="naturalized">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>                                                         
                  </div>                              
                </fieldset>                                          

                <div class="form-group">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
                  <input type="button" class="btn btn-primary" @click="saveForm()" value="Save">  
                  <input type="button" class="btn btn-success" @click="saveForm('city')" value="Submit to City">
                </div>            
              </form>   
              <div :class="{hide: isHide, 'alert': true, 'alert-success': true}">
                This application has been saved.
              </div>                            
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>  
</template>

<script type="text/javascript">
import axios from 'axios'
export default {
  data() {
    return {
      selected_partnership: '',
      hideCorporation: true,
      hideLLC: true,
      hidePartnership: true,
      hideBusinessNotIncorporated: true,
      bornOutsideUS: false,
      members: [
        { id: 1, name: '', email: '', phone: '', address: '' }
      ],
      shareholders: [
        { id: 1, name: '', percentage_owned: '', address: '' }
      ],
      owners: [
        { id: 1, name: '', percentage: '', email: '', address: '' }
      ]
    }
  },
  methods: {
    addMember() {
      this.members.push({ id: this.members.id + 1, name: '', email: '', phone: '', address: '' })
    },

    addShareHolder() {
      this.shareholders.push({ id: '', name: '', percentage_owned: '', address: '' })
    },

    addOwner() {
      this.owners.push({ id: '', name: '', percentage: '', email: '', address: '' })
    },

    activeClassification(event) {
      if(event.target.value == 'Corporation') {
        this.hideCorporation = false
        this.hideLLC = true
        this.hidePartnership = true  
        this.hideBusinessNotIncorporated = false   
      }
      else if(event.target.value == 'Limited Liability Company') {
        this.hideCorporation = true
        this.hideLLC = false
        this.hidePartnership = true     
        this.hideBusinessNotIncorporated = false
      }
      else if(event.target.value == 'General Partnership' || event.target.value == 'Limited Partnership' || event.target.value == 'Sole Proprietorship') {
        this.hideCorporation = true
        this.hideLLC = true
        this.hidePartnership = false     
        this.hideBusinessNotIncorporated = false
        this.selected_partnership = event.target.value
      }      
    },
    checkBornOutsideUS(event) {
      if(event.target.value == 'Yes') {
        this.bornOutsideUS = true   
      } 
      else {
        this.bornOutsideUS = false 
      }     
    }
  }
}
</script>

<style scoped>
fieldset {
    border: 1px solid #ced4da !important;
    border-radius: 12px;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:auto;
    padding:0 10px;
    border-bottom:none;
}
.hide{
  display: none;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
