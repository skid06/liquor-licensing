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
              <div :class="{hide: isHide, 'alert': true, 'alert-success': true}">
                This application has been saved.
              </div>                 
                <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" v-model="address" id="inputAddress" placeholder="1234 Main St">
                  <input type="hidden" class="form-control" v-model="app_id" id="app_id">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" v-model="city" id="inputCity">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control" v-model="state">
                      <option selected="">Choose...</option>
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="DC">District Of Columbia</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="HI">Hawaii</option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NV">Nevada</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NM">New Mexico</option>
                      <option value="NY">New York</option>
                      <option value="NC">North Carolina</option>
                      <option value="ND">North Dakota</option>
                      <option value="OH">Ohio</option>
                      <option value="OK">Oklahoma</option>
                      <option value="OR">Oregon</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SC">South Carolina</option>
                      <option value="SD">South Dakota</option>
                      <option value="TN">Tennessee</option>
                      <option value="TX">Texas</option>
                      <option value="UT">Utah</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WA">Washington</option>
                      <option value="WV">West Virginia</option>
                      <option value="WI">Wisconsin</option>
                      <option value="WY">Wyoming</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" v-model="zip" id="inputZip">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputClass">Class</label>
                    <select id="inputClass" class="form-control" v-model="license_class">
                      <option selected="">Choose...</option>
                      <option value="Class A">Class A</option>
                      <option value="Class B">Class B</option>
                      <option value="Class C">Class C</option>
                      <option value="Class D">Class D</option>
                      <option value="Class R-1">Class R-1</option>
                      <option value="Class R-2">Class R-2</option>
                      <option value="Class R-3">Class R-3</option>
                      <option value="Class R-4">Class R-4</option>
                      <option value="Class W">Class W</option>
                      <option value="Class E">Class E</option>
                      <option value="Class G">Class G</option>
                      <option value="Class CTR">Class CTR</option>
                      <option value="Class F">Class F</option>
                      <option value="Class H">Class H</option>
                    </select>                    
                    <!-- <input type="text" class="form-control" v-model="license_class" id="inputClass">  -->
                  </div>  
                  <div class="form-group col-md-4">
                    <label for="license">License</label>
                    <input type="text" class="form-control" v-model="license" id="license"> 
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="fee">Fee</label>
                    <input type="text" class="form-control" v-model="fee" id="fee"> 
                  </div>   
                </div>
                <div class="form-group">
                  <p>
                  The undersigned hereby files an application for the issuance of a city retailer’s license for the
                  sale of alcoholic liquor for the term ending April 30, 20______, and hereby certifies to the
                  following facts:                                  
                  </p> 
                </div> 
                <div class="form-group">
                    <strong>1. Applicant Corporate Information</strong>                                 
                </div>   
                <div class="form-group">
                  <label for="name">Corporate Name</label>
                  <input type="text" class="form-control" v-model="corporate_name" id="corporate-name"> 
                </div>    
                <div class="form-group">
                  <label for="corporate-address">Corporate Address</label>
                  <input type="text" class="form-control" v-model="corporate_address" id="corporate-address" placeholder="1234 Main St">
                </div>    
                <div class="form-group">
                  <label for="conductedname">Name under which business is to be conducted:</label>
                  <input type="text" class="form-control" v-model="name_business_to_be_conducted" id="conducted-name"> 
                </div> 
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="business-phone-number">Business Phone No.:</label>
                    <input type="text" class="form-control" v-model="business_phone" id="business-phone-number"> 
                  </div>  
                  <div class="form-group col-md-4">
                    <label for="business-mobile-no">Business Mobile No.</label>
                    <input type="text" class="form-control" v-model="business_mobile" id="mobile-no"> 
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="business-email">Business Email</label>
                    <input type="text" class="form-control" v-model="business_email" id="business-email"> 
                  </div>   
                </div>      
                <div class="form-group">
                  <div>
                    <strong>President</strong>                                 
                  </div> 
                </div>   
                <div class="form-group">
                  <label for="president-name">President Name</label>
                  <input type="text" class="form-control" v-model="president_name" id="president-name"> 
                </div>    
                <div class="form-group">
                  <label for="president-address">President Address</label>
                  <input type="text" class="form-control" v-model="president_address" id="president-address" placeholder="1234 Main St">
                </div>    
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="president-phone-number">President Phone No.:</label>
                    <input type="text" class="form-control" v-model="president_phone" id="president-phone-number"> 
                  </div>  
                  <div class="form-group col-md-4">
                    <label for="president-mobile-no">President Mobile No.</label>
                    <input type="text" class="form-control" v-model="president_mobile" id="president-mobile-no"> 
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="president-email">President Email</label>
                    <input type="text" class="form-control" v-model="president_email" id="president-email"> 
                  </div>   
                </div> 
                <div class="form-group">
                  <div>
                    <strong>Vice President</strong>                                 
                  </div> 
                </div>   
                <div class="form-group">
                  <label for="vice-president-name">Vice President Name</label>
                  <input type="text" class="form-control" v-model="vice_president_name" id="vice-president-name"> 
                </div>    
                <div class="form-group">
                  <label for="vice-president-address">Vice President Address</label>
                  <input type="text" class="form-control" v-model="vice_president_address" id="vice-president-address" placeholder="1234 Main St">
                </div>    
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="vice-president-phone-number">Vice President Phone No.:</label>
                    <input type="text" class="form-control" v-model="vice_president_phone" id="vice-president-phone-number"> 
                  </div>  
                  <div class="form-group col-md-4">
                    <label for="vice-president-mobile-no">Vice President Mobile No.</label>
                    <input type="text" class="form-control" v-model="vice_president_mobile" id="vice-president-mobile-no"> 
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="vice-president-email">Vice President Email</label>
                    <input type="text" class="form-control" v-model="vice_president_email" id="vice-president-email"> 
                  </div>   
                </div>      
                <div class="form-group">
                  <div>
                    <strong>Secretary</strong>                                 
                  </div> 
                </div>   
                <div class="form-group">
                  <label for="secretary-name">Secretary Name</label>
                  <input type="text" class="form-control" v-model="secretary_name" id="secretary-name"> 
                </div>    
                <div class="form-group">
                  <label for="secretary-address">Secretary Address</label>
                  <input type="text" class="form-control" v-model="secretary_address" id="secretary-address" placeholder="1234 Main St">
                </div>    
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="secretary-phone-number">Secretary Phone No.:</label>
                    <input type="text" class="form-control" v-model="secretary_phone" id="secretary-phone-number"> 
                  </div>  
                  <div class="form-group col-md-4">
                    <label for="secretary-mobile-no">Secretary Mobile No.</label>
                    <input type="text" class="form-control" v-model="secretary_mobile" id="secretary-mobile-no"> 
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="secretary-email">Secretary Email</label>
                    <input type="text" class="form-control" v-model="secretary_email" id="secretary-email"> 
                  </div>   
                </div>      
                <div class="form-group">
                  <div>
                    <strong>Treasurer</strong>                                 
                  </div> 
                </div>   
                <div class="form-group">
                  <label for="treasurer-name">Treasurer Name</label>
                  <input type="text" class="form-control" v-model="treasurer_name" id="treasurer-name"> 
                </div>    
                <div class="form-group">
                  <label for="treasurer-address">Treasurer Address</label>
                  <input type="text" class="form-control" v-model="treasurer_address" id="treasurer-address" placeholder="1234 Main St">
                </div>    
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="treasurer-phone-number">Treasurer Phone No.:</label>
                    <input type="text" class="form-control" v-model="treasurer_phone" id="treasurer-phone-number"> 
                  </div>  
                  <div class="form-group col-md-4">
                    <label for="treasurer-mobile-no">Treasurer Mobile No.</label>
                    <input type="text" class="form-control" v-model="treasurer_mobile" id="treasurer-mobile-no"> 
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="treasurer-email">Treasurer Email</label>
                    <input type="text" class="form-control" v-model="treasurer_email" id="treasurer-email"> 
                  </div>   
                </div>     
                <div class="form-group">
                  <div>
                    <strong>Director</strong>                                 
                  </div> 
                </div>   
                <div class="form-group">
                  <label for="director-name">Director Name</label>
                  <input type="text" class="form-control" v-model="director_name" id="director-name"> 
                </div>    
                <div class="form-group">
                  <label for="director-address">Director Address</label>
                  <input type="text" class="form-control" v-model="director_address" id="director-address" placeholder="1234 Main St">
                </div>    
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="director-phone-number">Director Phone No.:</label>
                    <input type="text" class="form-control" v-model="director_phone" id="director-phone-number"> 
                  </div>  
                  <div class="form-group col-md-4">
                    <label for="director-mobile-no">Director Mobile No.</label>
                    <input type="text" class="form-control" v-model="director_mobile" id="director-mobile-no"> 
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="director-email">Director Email</label>
                    <input type="text" class="form-control" v-model="director_email" id="director-email"> 
                  </div>   
                </div>       
                <div class="form-group">
                  <div>
                    <strong>Vice Director</strong>                                 
                  </div> 
                </div>   
                <div class="form-group">
                  <label for="vice-director-name">Vice Director Name</label>
                  <input type="text" class="form-control" v-model="vice_director_name" id="vice-director-name"> 
                </div>    
                <div class="form-group">
                  <label for="vice-director-address">Vice Director Address</label>
                  <input type="text" class="form-control" v-model="vice_director_address" id="vice-director-address" placeholder="1234 Main St">
                </div>    
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="vice-director-phone-number">Vice Director Phone No.:</label>
                    <input type="text" class="form-control" v-model="vice_director_phone" id="vice-director-phone-number"> 
                  </div>  
                  <div class="form-group col-md-4">
                    <label for="vice-director-mobile-no">Vice Director Mobile No.</label>
                    <input type="text" class="form-control" v-model="vice_director_mobile" id="vice-director-mobile-no"> 
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="vice-director-email">Vice Director Email</label>
                    <input type="text" class="form-control" v-model="vice_director_email" id="vice-director-email"> 
                  </div>   
                </div>             
                <div class="form-group">
                  <label for="date_incorporation">2. Date of Incorporation:</label>
                  <input type="date" class="form-control" v-model="date_incorporation" id="date_incorporation">
                </div>  
                <div class="form-group">
                  <label for="state_of">State of:</label>
                  <input type="date" class="form-control" v-model="state_incorporation" id="state_of">
                </div>      
                <div class="form-group">
                  <label for="other_than_illinois">If the state is a state other than Illinois, the date upon which the corporation was certified as a foreign corporation entitiled to conduct business in Illinois::</label>
                  <input type="date" class="form-control" v-model="other_state_incorporation_not_illinois" id="other_than_illinois">
                </div>                              
                <div class="form-group">
                  <label for="object-corporation">3. Object of the corporation as forth in the chapter:</label>
                  <input type="text" class="form-control" v-model="corporation_forth_chapter" id="object-corporation"> 
                </div>  
                <div class="form-group">
                  <div>
                    <strong>4. Registered Agent of the Corporation </strong>                                 
                  </div> 
                </div>    
                <div class="form-group">
                  <label for="agent-name">Agent Name</label>
                  <input type="text" class="form-control" v-model="corporation_agent_name" id="agent-name"> 
                </div>    
                <div class="form-group">
                  <label for="agent-address">Agent Address</label>
                  <input type="text" class="form-control" v-model="corporation_agent_address" id="agent-address" placeholder="1234 Main St">
                </div>    
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="agent-phone-number">Agent Phone No.:</label>
                    <input type="text" class="form-control" v-model="corporation_agent_phone" id="agent-phone-number"> 
                  </div>  
                  <div class="form-group col-md-4">
                    <label for="agent-mobile-no">Agent Mobile No.</label>
                    <input type="text" class="form-control" v-model="corporation_agent_mobile" id="agent-mobile-no"> 
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="agent-email">Agent Email</label>
                    <input type="text" class="form-control" v-model="corporation_agent_email" id="agent-email"> 
                  </div>  
                </div>   
                <div class="form-group">
                  <label for="principal-kind-of-business">5. Principal Kind of Business</label>
                  <input type="text" class="form-control" v-model="principal_kind_business" id="principal-kind-of-business"> 
                </div>            
                <div class="form-group">
                  <label for="principal-kind-of-business">6. Does applicant seek a license to sell alcoholic liquor upon the premises as a restaurant? </label>
                  <div class="radio"><label><input type="radio" id="principal-kind-of-business1" name="seek_license_sell_liquor" v-model="applicant_seek_license_alcoholic_restaurant" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="principal-kind-of-business2" name="seek_license_sell_liquor" v-model="applicant_seek_license_alcoholic_restaurant" value="No" > No </label> </div>
                </div>
                <div class="form-group">  
                  <label>If so, are premises:</label>                                 
                </div>  
                <div class="form-group">
                  <label for="maintained_held">a) Maintained and held out to the public as a place where meals are actually and regularly served?</label>
                  <div class="radio"><label><input type="radio" id="maintained_held1" name="maintained_held" v-model="maitained_to_public_meals_served" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="maintained_held2" name="maintained_held" v-model="maitained_to_public_meals_served" value="No" > No </label> </div>
                </div>    
                <div class="form-group">  
                  <label for="food_services_are">If so, food services are:</label>  
                  <input type="text" class="form-control" v-model="yes_food_services_are" id="food_services_are">                               
                </div>   
                <div class="form-group">
                  <label for="provided_with_adequate">b) Provided with adequate and sanitary kitchen and dining room equipment and capacity with sufficient employees to prepare, cook and serve suitable food?</label>
                  <div class="radio"><label><input type="radio" id="provided_with_adequate1" name="provided_with_adequate" v-model="serve_suitable_food" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="provided_with_adequate2" name="provided_with_adequate" v-model="serve_suitable_food" value="No" > No </label> </div>
                </div> 
                <div class="form-group">
                  <label for="applicant_is_club">7. If applicant is a club, has it the qualifications described in the illinois act relating to alcoholic liquors?</label>
                  <div class="radio"><label><input type="radio" id="applicant_is_club1" name="applicant_is_club" v-model="qualifications_described_illinois_act" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="applicant_is_club2" name="applicant_is_club" v-model="qualifications_described_illinois_act" value="No" > No </label> </div>
                </div> 
                <div class="form-group">
                  <label for="applicant_own_premises">8. Does applicant own premises for which this license is sought?</label>
                  <div class="radio"><label><input type="radio" id="applicant_own_premises1" name="applicant_own_premises" v-model="applicant_own_premises_license_sought" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="applicant_own_premises2" name="applicant_own_premises" v-model="applicant_own_premises_license_sought" value="No" > No </label> </div>
                </div>   
                <div class="form-group">  
                  <label for="applicant_a_lease">If not, has applicant a lease on such premises covering the full period for which license is sought?</label>  
                  <div class="radio"><label><input type="radio" id="applicant_a_lease1" name="applicant_a_lease" v-model="applicant_lease_premises_license_sought" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="applicant_a_lease2" name="applicant_a_lease" v-model="applicant_lease_premises_license_sought" value="No" > No </label> </div>                              
                </div>  
                <div class="form-group">  
                  <label>If so, give Name and Address of lessor:</label>  
                </div>  
                <div class="form-group">
                  <label for="lessor-name">Name</label>
                  <input type="text" class="form-control" v-model="lessor_name" id="lessor"> 
                </div>    
                <div class="form-group">
                  <label for="lessor-address">Address</label>
                  <input type="text" class="form-control" v-model="lessor_address" id="lesson-address" placeholder="1234 Main St">
                </div> 
                <div class="form-group">
                  <label for="period-covered-lease-from">Period Covered Lease</label>
                  From: <input type="date" class="form-control" v-model="period_covered_lease_from" id="period-covered-lease-from" style="width: 50%"> - To: <input type="date" class="form-control" v-model="period_covered_lease_to" id="period-covered-lease-to" style="width: 50%"> 
                </div>   
                <div class="form-group">
                  <label for="applicant_own_premises">8. Does applicant own premises for which this license is sought?</label>
                  <div class="radio"><label><input type="radio" id="applicant_own_premises1" name="applicant_own_premises" v-model="applicant_own_premise_license_sought" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="applicant_own_premises2" name="applicant_own_premises" v-model="applicant_own_premise_license_sought" value="No" > No </label> </div>
                </div>   
                <div class="form-group">  
                  <label for="applicant_a_food_dispenser">9. Is applicant a food dispenser?</label>  
                  <div class="radio"><label><input type="radio" id="applicant_a_food_dispenser1" name="applicant_a_food_dispenser" v-model="applicant_food_dispenser" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="applicant_a_food_dispenser2" name="applicant_a_food_dispenser" v-model="applicant_food_dispenser" value="No" > No </label> </div>                              
                </div> 
                <div class="form-group">  
                  <label for="give_no_license">If so, give number of license:</label>  
                  <input type="text" class="form-control" v-model="applicant_food_dispenser_number_license" id="give_no_license"> 
                </div>    
                <div class="form-group">  
                  <label for="applicant_personally_actively">10. Will applicant be personally, actively involved in the on premise day-to-day operation of the business to be licensed?</label>  
                  <div class="radio"><label><input type="radio" id="applicant_personally_actively1" name="applicant_personally_actively" v-model="applicant_actively_involved_day_operation" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="applicant_personally_actively2" name="applicant_personally_actively" v-model="applicant_actively_involved_day_operation" value="No" > No </label> </div>                              
                </div> 
                <div class="form-group">  
                  <label for="business_managed_by">11. Is the business or will the business for which a liquor license is sought be managed by a manager or agent?</label>  
                  <div class="radio"><label><input type="radio" id="business_managed_by1" name="business_managed_by" v-model="business_liquor_license_sought_manager" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="business_managed_by2" name="business_managed_by" v-model="business_liquor_license_sought_manager" value="No" > No </label> </div>                              
                </div>   
                <div class="form-group">  
                  <label>If so, give Name, Address and Phone</label>  
                </div>                                  
                <div class="form-group">
                  <label for="manager_name">Name</label>
                  <input type="text" class="form-control" v-model="manager_name" id="manager_name"> 
                </div>    
                <div class="form-group">
                  <label for="manager_address">Address</label>
                  <input type="text" class="form-control" v-model="manager_address" id="manager_address" placeholder="1234 Main St">
                </div>    
                <div class="form-group">
                  <label for="manager_phone">Phone</label>
                  <input type="text" class="form-control" v-model="manager_phone" id="manager_phone">
                </div>   
                <div class="form-group">
                  <label for="amount_anticipated_alcohol">12. What is the amount of anticipated alcoholic liquor sales a a percentage of gross annual sales of the business?</label>
                  <input type="text" class="form-control" v-model="amount_anticipated_liquor_sales" id="amount_anticipated_alcohol">
                </div>  
                <div class="form-group">
                  <label for="amount_anticipated_alcohol">13. Is applicant seeking approval for any of the following uses:</label>
                </div>                                                                                                            
                <div class="form-group">
                  <label for="beer_garden">Beer Garden?</label>
                  <div class="radio"><label><input type="radio" id="beer_garden1" name="beer_garden" v-model="applicant_seeking_approval_beer_garden" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="beer_garden2" name="beer_garden" v-model="applicant_seeking_approval_beer_garden" value="No" > No </label> </div>                              
                </div>    
                <div class="form-group">  
                  <label for="outdoor_seating_area">Outdoor seating area?</label>  
                  <div class="radio"><label><input type="radio" id="outdoor_seating_area1" name="outdoor_seating_area" v-model="applicant_seeking_approval_outdoor_seating_area" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="outdoor_seating_area2" name="outdoor_seating_area" v-model="applicant_seeking_approval_outdoor_seating_area" value="No" > No </label> </div>                              
                </div>  
                <div class="form-group">  
                  <label for="location_applicant_within_onehundred">14. Is the location of applicant's business for which license is sought within 100 feet of the property of a church, school, hospital, home for the aged or indigent persons or for veterans, their wives or childer or any military or naval station?</label>  
                  <div class="radio"><label><input type="radio" id="location_applicant_within_onehundred1" name="location_applicant_within_onehundred" v-model="location_applicants_business_within_100ft_property_of_church" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="location_applicant_within_onehundred2" name="location_applicant_within_onehundred" v-model="location_applicants_business_within_100ft_property_of_church" value="No" > No </label> </div>                              
                </div> 
                <div class="form-group">  
                  <label for="importing_or_distributor">15. Has any manufacturer, importing distributor or distributor directly or indirectly paid or agreed to pay for this license, advanced money or anything else of value, or any credit(other than merchandising credit in the ordinary course of business for aperiod not to exceed 90days) or is such person directly or indirectly interested in the ownership, conduct or operation of the place of business?</label>  
                  <div class="radio"><label><input type="radio" id="importing_or_distributor1" name="importing_or_distributor" v-model="manufacturer_agreed_to_pay_license" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="importing_or_distributor2" name="importing_or_distributor" v-model="manufacturer_agreed_to_pay_license" value="No" > No </label> </div>                              
                </div>    
                <div class="form-group">  
                  <label for="applicant_engaged_manufacturer">16. Is the applicant engaged in the manufacturer of alcoholic liquors?</label>  
                  <div class="radio"><label><input type="radio" id="applicant_engaged_manufacturer1" name="applicant_engaged_manufacturer" v-model="applicant_engaged_manufacturer_alcoholic_liquors" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="applicant_engaged_manufacturer2" name="applicant_engaged_manufacturer" v-model="applicant_engaged_manufacturer_alcoholic_liquors" value="No" > No </label> </div>                              
                </div>      
                <div class="form-group">
                  <label for="yes_applicant_engaged_manufacturer">If so, at what locations?</label>
                  <input type="text" class="form-control" v-model="applicant_engaged_manufacturer_alcoholic_liquors_location" id="yes_applicant_engaged_manufacturer">
                </div>     
                <div class="form-group">  
                  <label for="applicant_conducting_business_importing">17. Is the applicant conducting business of an importing distributor or distributor of alcoholic liquors?</label>  
                  <div class="radio"><label><input type="radio" id="applicant_conducting_business_importing1" name="applicant_conducting_business_importing" v-model="applicant_conducting_business_importing_distributor" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="applicant_conducting_business_importing2" name="applicant_conducting_business_importing" v-model="applicant_conducting_business_importing_distributor" value="No" > No </label> </div>                              
                </div>      
                <div class="form-group">
                  <label for="yes_applicant_conducting_business_importing">If so, at what locations?</label>
                  <input type="text" class="form-control" v-model="applicant_conducting_business_importing_distributor_location" id="yes_applicant_conducting_business_importing">
                </div>  
                <div class="form-group">  
                  <label for="stockholders_owning_aggregate">18. Has any officer, manager, or corporation director, or any stockholder or stockholders owning in the aggregate more than 5% of the stock of such corporation, ever been convicted of any felony under any federal or state law?</label>  
                  <div class="radio"><label><input type="radio" id="stockholders_owning_aggregate1" name="stockholders_owning_aggregate" v-model="officer_own_five_percent_convicted_felony" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="stockholders_owning_aggregate2" name="stockholders_owning_aggregate" v-model="officer_own_five_percent_convicted_felony" value="No" > No </label> </div>                              
                </div>             
                <div class="form-group">
                  <label>If so, give name or persons convicted, stating date and offence</label>
                </div> 
                <div class="form-group">
                  <label for="name_person_convicted">Name</label>
                  <input type="text" class="form-control" v-model="officer_own_five_percent_convicted__felony_name" id="name_person_convicted">
                </div> 
                <div class="form-group">
                  <label for="date_convicted">Date</label>
                  <input type="date" class="form-control" v-model="officer_own_five_percent_convicted_felony_date" id="date_convicted">
                </div>       
                <div class="form-group">
                  <label for="offence_convicted">Offence</label>
                  <input type="text" class="form-control" v-model="officer_own_five_percent_convicted_felony_offence" id="offence_convicted">
                </div>
                <div class="form-group">  
                  <label for="stockholders_convicted_violation_federal_law">19. Has any officer, manager or diretor of said corporation, or any stockholders owning in the aggregate more than 5% of the stock of such corporation, ever been convicted of a violation of any federal or state liquor law(s)?</label>  
                  <div class="radio"><label><input type="radio" id="stockholders_convicted_violation_federal_law1" name="stockholders_convicted_violation_federal_law" v-model="officer_own_five_percent_convicted_violation" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="stockholders_convicted_violation_federal_law2" name="stockholders_convicted_violation_federal_law" v-model="officer_own_five_percent_convicted_violation" value="No" > No </label> </div>                              
                </div>             
                <div class="form-group">
                  <label>If so, give name or persons convicted, stating date and offence</label>
                </div> 
                <div class="form-group">
                  <label for="name_stockholders_convicted_violation_federal_law">Name</label>
                  <input type="text" class="form-control" v-model="officer_own_five_percent_convicted__violation_name" id="name_stockholders_convicted_violation_federal_law">
                </div> 
                <div class="form-group">
                  <label for="date_stockholders_convicted_violation_federal_law">Date</label>
                  <input type="date" class="form-control" v-model="officer_own_five_percent_convicted_violation_date" id="date_stockholders_convicted_violation_federal_law">
                </div>       
                <div class="form-group">
                  <label for="offence_stockholders_convicted_violation_federal_law">Offence</label>
                  <input type="text" class="form-control" v-model="officer_own_five_percent_convicted_violation_offence" id="offence_stockholders_convicted_violation_federal_law">
                </div>            
                <div class="form-group">  
                  <label for="stockholders_convicted_gambling">20. Has any officer, manager or director of said corporation, or any stockholders owning in the aggregate more than 5% of the stock of such corporation, ever been convicted of gambling, keeping an illegal gambling place, of being the keeper of a house of ill fame; or of pandering or other crime or misdemeanor opposed to decency and morality?</label>  
                  <div class="radio"><label><input type="radio" id="stockholders_convicted_gambling1" name="stockholders_convicted_gambling" v-model="made_application_similar_license" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="stockholders_convicted_gambling2" name="stockholders_convicted_gambling" v-model="made_application_similar_license" value="No" > No </label> </div>                              
                </div>             
                <div class="form-group">
                  <label>If so, give name or persons convicted, stating date and offence</label>
                </div> 
                <div class="form-group">
                  <label for="name_stockholders_convicted_gambling">Name</label>
                  <input type="text" class="form-control" v-model="officer_own_five_percent_convicted__gambling_name" id="name_stockholders_convicted_gambling">
                </div> 
                <div class="form-group">
                  <label for="date_stockholders_convicted_gambling">Date</label>
                  <input type="date" class="form-control" v-model="officer_own_five_percent_convicted_gambling_date" id="date_stockholders_convicted_gambling">
                </div>       
                <div class="form-group">
                  <label for="offence_stockholders_convicted_gambling">Offence</label>
                  <input type="text" class="form-control" v-model="officer_own_five_percent_convicted_gambling_offence" id="offence_stockholders_convicted_gambling">
                </div>  
                <div class="form-group">  
                  <label for="made_application_for_similar_license">21. Has the corporation (applicant) or any officer, manager, or director of said corporation, or any stockholders owning in the aggregate more than 5% of the stock of such corporation, made application for a similar license for this period for any premises other than that described above?</label>  
                  <div class="radio"><label><input type="radio" id="made_application_for_similar_license1" name="made_application_for_similar_license" v-model="made_application_similar_license" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="made_application_for_similar_license2" name="made_application_for_similar_license" v-model="made_application_similar_license" value="No" > No </label> </div>                              
                </div>             
                <div class="form-group">
                  <label>If so, give name or persons convicted, stating date and offence</label>
                </div> 
                <div class="form-group">
                  <label for="name_made_application_for_similar_license">Name</label>
                  <input type="text" class="form-control" v-model="made_application_similar_license_name" id="name_made_application_for_similar_license">
                </div> 
                <div class="form-group">
                  <label for="date_made_application_for_similar_license">Date</label>
                  <input type="date" class="form-control" v-model="made_application_similar_license_date" id="date_made_application_for_similar_license">
                </div>       
                <div class="form-group">
                  <label for="offence_made_application_for_similar_license">Offence</label>
                  <input type="text" class="form-control" v-model="made_application_similar_license_offence" id="offence_made_application_for_similar_license">
                </div>   
                <div class="form-group">
                  <label for="corporation_hold_federal_wagering_stamp">22. Does the corporation (applicant) or any officer, manager or director of said corporation or any stockholder(s) owning in the aggregate more than 20% of the stock of such corporation currently hold a federal wagering stamp?</label>
                  <input type="text" class="form-control" v-model="corporation_own_twenty_percent_federal_wagering_stamp" id="corporation_hold_federal_wagering_stamp">
                </div>       
                <div class="form-group">  
                  <label for="enforcing_official_interested_business_license_sought">23. Is any law enforcing official, mayor, alderman or member of the city council directly or indirectly interested in the business for which license is sought?</label>  
                  <div class="radio"><label><input type="radio" id="enforcing_official_interested_business_license_sought1" name="enforcing_official_interested_business_license_sought" v-model="law_enforcing_official_interested_business_license_sought" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="enforcing_official_interested_business_license_sought2" name="enforcing_official_interested_business_license_sought" v-model="law_enforcing_official_interested_business_license_sought" value="No" > No </label> </div>                              
                </div>    
                <div class="form-group">
                  <label for="name_party">Name of Party</label>
                  <input type="text" class="form-control" v-model="name_of_party" id="name_party">
                </div>   
                <div class="form-group">  
                  <label for="license_previously_issued_been_revoked">24. Has any license previously issued by the state, federal or local authorities to the corporation (applicant) or to any officer, manager, or director of said corporation, or any stockholder(s) owning in the aggregate more than 5% of such corporation, been revoked?</label>  
                  <div class="radio"><label><input type="radio" id="license_previously_issued_been_revoked1" name="license_previously_issued_been_revoked" v-model="five_percent_such_corporation_been_revoked" value="Yes" > Yes </label> </div>
                  <div class="radio"><label><input type="radio" id="license_previously_issued_been_revoked2" name="license_previously_issued_been_revoked" v-model="five_percent_such_corporation_been_revoked" value="No" > No </label> </div>                              
                </div>       
                <div class="form-group">
                  <label>If so, give name of licensee, and state reasons for and date of revocation:</label>
                </div>   
                <div class="form-group">
                  <label for="name_license">Name of License</label>
                  <input type="text" class="form-control" v-model="five_percent_such_corporation_been_revoked_name_license" id="name_license">
                </div>  
                <div class="form-group">
                  <label for="reason">Reason:</label>
                  <input type="text" class="form-control" v-model="five_percent_such_corporation_been_revoked_reason" id="reason">
                </div> 
                <div class="form-group">
                  <label for="date_revocation">Date of Revocation:</label>
                  <input type="date" class="form-control" v-model="five_percent_such_corporation_been_revoked_date_revocation" id="date_revocation">
                </div>         
                <!-- <div class="form-group">
                  <label>Completed?</label> <br />
                  <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>  
                </div>-->
                <div v-if="application.status === 'incomplete'">
                  <input type="button" class="btn btn-primary" @click="saveForm()" value="Save"> 
                  <input type="button" class="btn btn-success" @click="saveForm('city')" value="Submit to City"> 
                </div>
                <div v-else-if="application.status === 'completed'">
                  <input type="button" class="btn btn-primary" @click="saveForm()" value="Update"> 
                </div>
              </form> 
              <!-- <a v-if="application.status === 'completed'" href="javascript:;" class="btn btn-lg red">
                 
                <i class="glyphicon glyphicon-align-left"></i>Notes
              </a>   -->
              <a v-if="application.status === 'completed'" @click="getNotes" href="#" class="btn btn-lg red btn-popup" data-toggle="modal" data-target="#myModal"> Notes
                <i class="fa fa-edit"></i>
              </a>     
              
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content mt-element-list">
                    <div class="modal-header mt-list-head list-simple ext-1 font-white bg-green-sharp">
                      <div class="list-head-title-container">
                        
                        <h3 class="modal-title list-title">Notes</h3>
                      </div>
                    </div>
                    <div class="modal-body mt-element-list">
                      <div class="mt-list-container list-simple ext-1">
                        <ul>
                          <li class="mt-list-item done" v-for="log in messages" :key="log.id">
                            <div class="list-icon-container">
                              <span style="font-size:10px;"> {{ log.admin_id != null ? log.admin.name : 'You' }} </span>
                            </div>
                            <div class="list-datetime"> {{ log.created_at | moment("from", "now") }} </div>
                            <div class="list-item-content">
                              <p class="uppercase">
                                <a href="javascript:;">{{ log.message }}</a>
                              </p>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="form-group mt">
                        <textarea class="form-control" id="message" v-model="form.message" placeholder="Enter New Message"></textarea>
                      </div>
                      <button type="button" @click="postNote" class="btn btn-default btn-success"><span class="glyphicon glyphicon-plus"></span> Save</button>       
                      <div :class="{'form-group': true, 'alert-danger': withError}" style="">
                        <ul>
                          <li v-for="error in errors.message" :key="error">{{ error }}</li>
                        </ul>
                      </div>                                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>                
                  
                </div>
              </div>                                  
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
      app_id: '',
      license_class: '',
      license: '',
      fee: '',
      address: '',
      city: '',
      state: '',
      zip: '',
      corporate_name: '',
      corporate_address: '',
      name_business_to_be_conducted: '',
      business_phone: '',
      business_mobile: '',
      business_email: '',
      president_name: '',
      president_address: '',
      president_phone: '',
      president_mobile: '',
      president_email: '',
      vice_president_name: '',
      vice_president_address: '',
      vice_president_phone: '',
      vice_president_mobile: '',
      vice_president_email: '',  
      secretary_name: '',
      secretary_address: '',
      secretary_phone: '',
      secretary_mobile: '',
      secretary_email: '',   
      treasurer_name: '',
      treasurer_address: '',
      treasurer_phone: '',
      treasurer_mobile: '',
      treasurer_email: '',  
      director_name: '',
      director_address: '',
      director_phone: '',
      director_mobile: '',
      director_email: '',   
      vice_director_name: '',
      vice_director_address: '',
      vice_director_phone: '',
      vice_director_mobile: '',
      vice_director_email: '', 
      date_incorporation: '', 
      state_incorporation: '', 
      other_state_incorporation_not_illinois: '',  
      corporation_forth_chapter: '',
      corporation_agent_name: '',
      corporation_agent_address: '',
      corporation_agent_phone: '',
      corporation_agent_mobile: '',
      corporation_agent_email: '',   
      principal_kind_business: '', 
      applicant_seek_license_alcoholic_restaurant: '',  
      maitained_to_public_meals_served: '',  
      yes_food_services_are: '',   
      serve_suitable_food: '',    
      qualifications_described_illinois_act: '', 
      applicant_own_premises_license_sought: '',   
      applicant_lease_premises_license_sought: '',   
      lessor_name: '',  
      lessor_address: '',   
      period_covered_lease_from: '',                                                    
      period_covered_lease_to: '',
      applicant_own_premise_license_sought: '',
      applicant_food_dispenser: '',
      applicant_food_dispenser_number_license: '',
      applicant_actively_involved_day_operation: '',
      business_liquor_license_sought_manager: '',
      manager_name: '',
      manager_address: '',
      manager_phone: '',  
      amount_anticipated_liquor_sales: '',  
      applicant_seeking_approval_beer_garden: '',           
      applicant_seeking_approval_outdoor_seating_area: '',  
      location_applicants_business_within_100ft_property_of_church: '',  
      manufacturer_agreed_to_pay_license: '',  
      applicant_engaged_manufacturer_alcoholic_liquors: '',  
      applicant_engaged_manufacturer_alcoholic_liquors_location: '', 
      applicant_conducting_business_importing_distributor: '', 
      applicant_conducting_business_importing_distributor_location: '', 
      officer_own_five_percent_convicted_felony: '', 
      officer_own_five_percent_convicted__felony_name: '', 
      officer_own_five_percent_convicted_felony_date: '',
      officer_own_five_percent_convicted_felony_offence: '', 
      officer_own_five_percent_convicted_violation: '', 
      officer_own_five_percent_convicted__violation_name: '', 
      officer_own_five_percent_convicted_violation_date: '',
      officer_own_five_percent_convicted_violation_offence: '',
      officer_own_five_percent_convicted_gambling: '', 
      officer_own_five_percent_convicted__gambling_name: '', 
      officer_own_five_percent_convicted_gambling_date: '',
      officer_own_five_percent_convicted_gambling_offence: '',
      made_application_similar_license: '', 
      made_application_similar_license_name: '', 
      made_application_similar_license_date: '',
      made_application_similar_license_offence: '',                                        
      corporation_own_twenty_percent_federal_wagering_stamp: '', 
      law_enforcing_official_interested_business_license_sought: '', 
      name_of_party: '', 
      five_percent_such_corporation_been_revoked: '', 
      five_percent_such_corporation_been_revoked_name_license: '', 
      five_percent_such_corporation_been_revoked_reason: '', 
      five_percent_such_corporation_been_revoked_date_revocation: '', 
      status: '',
      isHide: true,
      messages: [],
      form: {
        message: ''
      },
      errors: [],
      withError: false
    }
  },
  computed: {
    getAppData(){
      this.app_id = this.application.id
      this.license_class = this.application.class
      this.license = this.application.license
      this.fee = this.application.fee
      this.address = this.application.address
      this.city = this.application.city
      this.state = this.application.state
      this.zip = this.application.zip
      this.corporate_name = this.application.corporate_name
      this.corporate_address = this.application.corporate_address
      this.name_business_to_be_conducted = this.application.name_business_to_be_conducted
      this.business_phone = this.application.business_phone
      this.business_mobile = this.application.business_mobile
      this.business_email = this.application.business_email
      this.president_name = this.application.president_name
      this.president_address = this.application.president_address
      this.president_phone = this.application.president_phone
      this.president_mobile = this.application.president_mobile
      this.president_email = this.application.president_email
      this.vice_president_name = this.application.vice_president_name
      this.vice_president_address = this.application.vice_president_address
      this.vice_president_phone = this.application.vice_president_phone
      this.vice_president_mobile = this.application.vice_president_mobile
      this.vice_president_email = this.application.vice_president_email
      this.secretary_name = this.application.secretary_name
      this.secretary_address = this.application.secretary_address
      this.secretary_phone = this.application.secretary_phone
      this.secretary_mobile = this.application.secretary_mobile
      this.secretary_email = this.application.secretary_email   
      this.treasurer_name = this.application.treasurer_name
      this.treasurer_address = this.application.treasurer_address
      this.treasurer_phone = this.application.treasurer_phone
      this.treasurer_mobile = this.application.treasurer_mobile
      this.treasurer_email = this.application.treasurer_email
      this.director_name = this.application.director_name
      this.director_address = this.application.director_address
      this.director_phone = this.application.director_phone
      this.director_mobile = this.application.director_mobile
      this.director_email = this.application.director_email
      this.vice_director_name = this.application.vice_director_name
      this.vice_director_address = this.application.vice_director_address
      this.vice_director_phone = this.application.vice_director_phone
      this.vice_director_mobile = this.application.vice_director_mobile
      this.vice_director_email = this.application.vice_director_email
      this.date_incorporation = this.application.date_incorporation
      this.state_incorporation = this.application.state_incorporation
      this.other_state_incorporation_not_illinois = this.application.other_state_incorporation_not_illinois
      this.corporation_forth_chapter = this.application.corporation_forth_chapter
      this.corporation_agent_name = this.application.corporation_agent_name
      this.corporation_agent_address = this.application.corporation_agent_address
      this.corporation_agent_phone = this.application.corporation_agent_phone
      this.corporation_agent_mobile = this.application.corporation_agent_mobile
      this.corporation_agent_email = this.application.corporation_agent_email   
      this.principal_kind_business = this.application.principal_kind_business
      this.applicant_seek_license_alcoholic_restaurant = this.application.applicant_seek_license_alcoholic_restaurant
      this.maitained_to_public_meals_served = this.application.maitained_to_public_meals_served  
      this.yes_food_services_are = this.application.yes_food_services_are   
      this.serve_suitable_food = this.application.serve_suitable_food    
      this.qualifications_described_illinois_act = this.application.qualifications_described_illinois_act 
      this.applicant_own_premises_license_sought = this.application.applicant_own_premises_license_sought   
      this.applicant_lease_premises_license_sought = this.application.applicant_lease_premises_license_sought  
      this.lessor_name = this.application.lessor_name  
      this.lessor_address = this.application.lessor_address   
      this.period_covered_lease_from = this.application.period_covered_lease_from                                                   
      this.period_covered_lease_to = this.application.period_covered_lease_to
      this.applicant_own_premise_license_sought = this.application.applicant_own_premise_license_sought
      this.applicant_food_dispenser = this.application.applicant_food_dispenser
      this.applicant_food_dispenser_number_license = this.application.applicant_food_dispenser_number_license
      this.applicant_actively_involved_day_operation = this.application.applicant_actively_involved_day_operation
      this.business_liquor_license_sought_manager = this.application.business_liquor_license_sought_manager
      this.manager_name = this.application.manager_name
      this.manager_address = this.application.manager_address
      this.manager_phone = this.application.manager_phone
      this.amount_anticipated_liquor_sales = this.application.amount_anticipated_liquor_sales 
      this.applicant_seeking_approval_beer_garden = this.application.applicant_seeking_approval_beer_garden           
      this.applicant_seeking_approval_outdoor_seating_area = this.application.applicant_seeking_approval_outdoor_seating_area 
      this.location_applicants_business_within_100ft_property_of_church = this.application.location_applicants_business_within_100ft_property_of_church 
      this.manufacturer_agreed_to_pay_license = this.application.manufacturer_agreed_to_pay_license  
      this.applicant_engaged_manufacturer_alcoholic_liquors = this.application.applicant_engaged_manufacturer_alcoholic_liquors  
      this.applicant_engaged_manufacturer_alcoholic_liquors_location = this.application.applicant_engaged_manufacturer_alcoholic_liquors_location
      this.applicant_conducting_business_importing_distributor = this.application.applicant_conducting_business_importing_distributor
      this.applicant_conducting_business_importing_distributor_location = this.application.applicant_conducting_business_importing_distributor_location 
      this.officer_own_five_percent_convicted_felony = this.application.officer_own_five_percent_convicted_felony 
      this.officer_own_five_percent_convicted__felony_name = this.application.officer_own_five_percent_convicted__felony_name 
      this.officer_own_five_percent_convicted_felony_date = this.application.officer_own_five_percent_convicted_felony_date
      this.officer_own_five_percent_convicted_felony_offence = this.application.officer_own_five_percent_convicted_felony_offence 
      this.officer_own_five_percent_convicted_violation = this.application.officer_own_five_percent_convicted_violation 
      this.officer_own_five_percent_convicted__violation_name = this.application.officer_own_five_percent_convicted__violation_name 
      this.officer_own_five_percent_convicted_violation_date = this.application.officer_own_five_percent_convicted_violation_date
      this.officer_own_five_percent_convicted_violation_offence = this.application.officer_own_five_percent_convicted_violation_offence
      this.officer_own_five_percent_convicted_gambling = this.application.officer_own_five_percent_convicted_gambling 
      this.officer_own_five_percent_convicted__gambling_name = this.application.officer_own_five_percent_convicted__gambling_name 
      this.officer_own_five_percent_convicted_gambling_date = this.application.officer_own_five_percent_convicted_gambling_date
      this.officer_own_five_percent_convicted_gambling_offence = this.application.officer_own_five_percent_convicted_gambling_offence
      this.made_application_similar_license = this.application.made_application_similar_license 
      this.made_application_similar_license_name = this.application.made_application_similar_license_name 
      this.made_application_similar_license_date = this.application.made_application_similar_license_date
      this.made_application_similar_license_offence = this.application.made_application_similar_license_offence                                        
      this.corporation_own_twenty_percent_federal_wagering_stamp = this.application.corporation_own_twenty_percent_federal_wagering_stamp 
      this.law_enforcing_official_interested_business_license_sought = this.application.law_enforcing_official_interested_business_license_sought 
      this.name_of_party = this.application.name_of_party 
      this.five_percent_such_corporation_been_revoked = this.application.five_percent_such_corporation_been_revoked 
      this.five_percent_such_corporation_been_revoked_name_license = this.application.five_percent_such_corporation_been_revoked_name_license 
      this.five_percent_such_corporation_been_revoked_reason = this.application.five_percent_such_corporation_been_revoked_reason 
      this.five_percent_such_corporation_been_revoked_date_revocation = this.application.five_percent_such_corporation_been_revoked_date_revocation                 
    }
  },
  methods: {
    saveForm(submit){
      axios
        .post('/api/user/applications', {
          app_id: this.app_id,
          class: this.license_class,
          license: this.license,
          fee: this.fee,
          address: this.address,
          city: this.city,
          state: this.state,
          zip: this.zip,
          corporate_name: this.corporate_name,
          corporate_address: this.corporate_address,
          name_business_to_be_conducted: this.name_business_to_be_conducted,
          business_phone: this.business_phone,
          business_mobile: this.business_mobile,
          business_email: this.business_email,
          president_name: this.president_name,
          president_address: this.president_address,
          president_phone: this.president_phone,
          president_mobile: this.president_mobile,
          president_email: this.president_email,
          vice_president_name: this.vice_president_name,
          vice_president_address: this.vice_president_address,
          vice_president_phone: this.vice_president_phone,
          vice_president_mobile: this.vice_president_mobile,
          vice_president_email: this.vice_president_email,  
          secretary_name: this.secretary_name,
          secretary_address: this.secretary_address,
          secretary_phone: this.secretary_phone,
          secretary_mobile: this.secretary_mobile,
          secretary_email: this.secretary_email,
          treasurer_name: this.treasurer_name,
          treasurer_address: this.treasurer_address,
          treasurer_phone: this.treasurer_phone,
          treasurer_mobile: this.treasurer_mobile,
          treasurer_email: this.treasurer_email,
          director_name: this.director_name,
          director_address: this.director_address,
          director_phone: this.director_phone,
          director_mobile: this.director_mobile,
          director_email: this.director_email,
          vice_director_name: this.vice_president_name,
          vice_director_address: this.vice_president_address,
          vice_director_phone: this.vice_president_phone,
          vice_director_mobile: this.vice_president_mobile,
          vice_director_email: this.vice_president_email,
          date_incorporation: this.date_incorporation,
          state_incorporation: this.state_incorporation, 
          other_state_incorporation_not_illinois: this.other_state_incorporation_not_illinois,
          corporation_forth_chapter: this.corporation_forth_chapter,
          corporation_agent_name: this.corporation_agent_name,
          corporation_agent_address: this.corporation_agent_address,
          corporation_agent_phone: this.corporation_agent_phone,
          corporation_agent_mobile: this.corporation_agent_mobile,
          corporation_agent_email: this.corporation_agent_email,
          principal_kind_business: this.principal_kind_business,
          applicant_seek_license_alcoholic_restaurant: this.applicant_seek_license_alcoholic_restaurant,
          maintained_to_public_meals_served: this.maintained_to_public_meals_served,
          yes_food_services_are: this.yes_food_services_are,   
          serve_suitable_food: this.serve_suitable_food,
          qualifications_described_illinois_act: this.qualifications_described_illinois_act,
          applicant_own_premises_license_sought: this.applicant_own_premises_license_sought,
          applicant_lease_premises_license_sought: this.applicant_lease_premises_license_sought,
          lessor_name: this.lessor_name,
          lessor_address: this.lessor_address,
          period_covered_lease_from: this.period_covered_lease_from,                                               
          period_covered_lease_to: this.period_covered_lease_to,
          applicant_own_premise_license_sought: this.applicant_own_premise_license_sought,
          applicant_food_dispenser: this.applicant_food_dispenser,
          applicant_food_dispenser_number_license: this.applicant_food_dispenser_number_license,
          applicant_actively_involved_day_operation: this.applicant_actively_involved_day_operation,
          business_liquor_license_sought_manager: this.business_liquor_license_sought_manager,
          manager_name: this.manager_name,
          manager_address: this.manager_address,
          manager_phone: this.manager_phone,
          amount_anticipated_liquor_sales: this.amount_anticipated_liquor_sales,  
          applicant_seeking_approval_beer_garden: this.applicant_seeking_approval_beer_garden,
          applicant_seeking_approval_outdoor_seating_area: this.applicant_seeking_approval_outdoor_seating_area,
          location_applicants_business_within_100ft_property_of_church: this.location_applicants_business_within_100ft_property_of_church,  
          manufacturer_agreed_to_pay_license: this.manufacturer_agreed_to_pay_license,
          applicant_engaged_manufacturer_alcoholic_liquors: this.applicant_engaged_manufacturer_alcoholic_liquors,
          applicant_engaged_manufacturer_alcoholic_liquors_location: this.applicant_engaged_manufacturer_alcoholic_liquors_location,
          applicant_conducting_business_importing_distributor: this.applicant_conducting_business_importing_distributor,
          applicant_conducting_business_importing_distributor_location: this.applicant_conducting_business_importing_distributor_location,
          officer_own_five_percent_convicted_felony: this.officer_own_five_percent_convicted_felony,
          officer_own_five_percent_convicted__felony_name: this.officer_own_five_percent_convicted__felony_name,
          officer_own_five_percent_convicted_felony_date: this.officer_own_five_percent_convicted_felony_date,
          officer_own_five_percent_convicted_felony_offence: this.officer_own_five_percent_convicted_felony_offence,
          officer_own_five_percent_convicted_violation: this.officer_own_five_percent_convicted_violation,
          officer_own_five_percent_convicted__violation_name: this.officer_own_five_percent_convicted_violation_name,
          officer_own_five_percent_convicted_violation_date: this.officer_own_five_percent_convicted_violation_date,
          officer_own_five_percent_convicted_violation_offence: this.officer_own_five_percent_convicted_violation_offence,
          officer_own_five_percent_convicted_gambling: this.officer_own_five_percent_convicted_gambling, 
          officer_own_five_percent_convicted__gambling_name: this.officer_own_five_percent_convicted__gambling_name, 
          officer_own_five_percent_convicted_gambling_date: this.officer_own_five_percent_convicted_gambling_date,
          officer_own_five_percent_convicted_gambling_offence: this.officer_own_five_percent_convicted_gambling_offence,
          made_application_similar_license: this.made_application_similar_license, 
          made_application_similar_license_name: this.made_application_similar_license_name, 
          made_application_similar_license_date: this.made_application_similar_license_date,
          made_application_similar_license_offence: this.made_application_similar_license_offence,                                        
          corporation_own_twenty_percent_federal_wagering_stamp: this.corporation_own_twenty_percent_federal_wagering_stamp, 
          law_enforcing_official_interested_business_license_sought: this.law_enforcing_official_interested_business_license_sought, 
          name_of_party: this.name_of_party, 
          five_percent_such_corporation_been_revoked: this.five_percent_such_corporation_been_revoked, 
          five_percent_such_corporation_been_revoked_name_license: this.five_percent_such_corporation_been_revoked_name_license, 
          five_percent_such_corporation_been_revoked_reason: this.five_percent_such_corporation_been_revoked_reason, 
          five_percent_such_corporation_been_revoked_date_revocation: this.five_percent_such_corporation_been_revoked_date_revocation, 
          status: (submit == 'city' ? 'completed' : 'incomplete')         
        })
        .then(response => {
          if(submit == 'city'){
            window.location.href = `/payment-form/${response.data.id}`
          }
          else{
            this.app_id = response.data.id
            this.license_class = response.data.class
            this.license = response.data.license
            this.fee = response.data.fee
            this.address = response.data.address
            this.city = response.data.city
            this.state = response.data.state
            this.zip = response.data.zip
            this.corporate_name = response.data.corporate_name
            this.corporate_address = response.data.corporate_address
            this.name_business_to_be_conducted = response.data.name_business_to_be_conducted
            this.business_phone = response.data.business_phone
            this.business_mobile = response.data.business_mobile
            this.business_email = response.data.business_email
            this.president_name = response.data.president_name
            this.president_address = response.data.president_address
            this.president_phone = response.data.president_phone
            this.president_mobile = response.data.president_mobile
            this.president_email = response.data.president_email
            this.vice_president_name = response.data.vice_president_name
            this.vice_president_address = response.data.vice_president_address
            this.vice_president_phone = response.data.vice_president_phone
            this.vice_president_mobile = response.data.vice_president_mobile
            this.vice_president_email = response.data.vice_president_email
            this.secretary_name = response.data.secretary_name
            this.secretary_address = response.data.secretary_address
            this.secretary_phone = response.data.secretary_phone
            this.secretary_mobile = response.data.secretary_mobile
            this.secretary_email = response.data.secretary_email   
            this.treasurer_name = response.data.treasurer_name
            this.treasurer_address = response.data.treasurer_address
            this.treasurer_phone = response.data.treasurer_phone
            this.treasurer_mobile = response.data.treasurer_mobile
            this.treasurer_email = response.data.treasurer_email
            this.director_name = response.data.director_name
            this.director_address = response.data.director_address
            this.director_phone = response.data.director_phone
            this.director_mobile = response.data.director_mobile
            this.director_email = response.data.director_email
            this.vice_director_name = response.data.vice_director_name
            this.vice_director_address = response.data.vice_director_address
            this.vice_director_phone = response.data.vice_director_phone
            this.vice_director_mobile = response.data.vice_director_mobile
            this.vice_director_email = response.data.vice_director_email
            this.date_incorporation = response.data.date_incorporation
            this.state_incorporation = response.data.state_incorporation
            this.other_state_incorporation_not_illinois = response.data.other_state_incorporation_not_illinois
            this.corporation_forth_chapter = response.data.corporation_forth_chapter
            this.corporation_agent_name = response.data.corporation_agent_name
            this.corporation_agent_address = response.data.corporation_agent_address
            this.corporation_agent_phone = response.data.corporation_agent_phone
            this.corporation_agent_mobile = response.data.corporation_agent_mobile
            this.corporation_agent_email = response.data.corporation_agent_email   
            this.principal_kind_business = response.data.principal_kind_business
            this.applicant_seek_license_alcoholic_restaurant = response.data.applicant_seek_license_alcoholic_restaurant
            this.maitained_to_public_meals_served = response.data.maitained_to_public_meals_served  
            this.yes_food_services_are = response.data.yes_food_services_are   
            this.serve_suitable_food = response.data.serve_suitable_food    
            this.qualifications_described_illinois_act = response.data.qualifications_described_illinois_act 
            this.applicant_own_premises_license_sought = response.data.applicant_own_premises_license_sought   
            this.applicant_lease_premises_license_sought = response.data.applicant_lease_premises_license_sought  
            this.lessor_name = response.data.lessor_name  
            this.lessor_address = response.data.lessor_address   
            this.period_covered_lease_from = response.data.period_covered_lease_from                                                   
            this.period_covered_lease_to = response.data.period_covered_lease_to
            this.applicant_own_premise_license_sought = response.data.applicant_own_premise_license_sought
            this.applicant_food_dispenser = response.data.applicant_food_dispenser
            this.applicant_food_dispenser_number_license = response.data.applicant_food_dispenser_number_license
            this.applicant_actively_involved_day_operation = response.data.applicant_actively_involved_day_operation
            this.business_liquor_license_sought_manager = response.data.business_liquor_license_sought_manager
            this.manager_name = response.data.manager_name
            this.manager_address = response.data.manager_address
            this.manager_phone = response.data.manager_phone
            this.amount_anticipated_liquor_sales = response.data.amount_anticipated_liquor_sales 
            this.applicant_seeking_approval_beer_garden = response.data.applicant_seeking_approval_beer_garden           
            this.applicant_seeking_approval_outdoor_seating_area = response.data.applicant_seeking_approval_outdoor_seating_area 
            this.location_applicants_business_within_100ft_property_of_church = response.data.location_applicants_business_within_100ft_property_of_church 
            this.manufacturer_agreed_to_pay_license = response.data.manufacturer_agreed_to_pay_license  
            this.applicant_engaged_manufacturer_alcoholic_liquors = response.data.applicant_engaged_manufacturer_alcoholic_liquors  
            this.applicant_engaged_manufacturer_alcoholic_liquors_location = response.data.applicant_engaged_manufacturer_alcoholic_liquors_location
            this.applicant_conducting_business_importing_distributor = response.data.applicant_conducting_business_importing_distributor
            this.applicant_conducting_business_importing_distributor_location = response.data.applicant_conducting_business_importing_distributor_location 
            this.officer_own_five_percent_convicted_felony = response.data.officer_own_five_percent_convicted_felony 
            this.officer_own_five_percent_convicted__felony_name = response.data.officer_own_five_percent_convicted__felony_name 
            this.officer_own_five_percent_convicted_felony_date = response.data.officer_own_five_percent_convicted_felony_date
            this.officer_own_five_percent_convicted_felony_offence = response.data.officer_own_five_percent_convicted_felony_offence 
            this.officer_own_five_percent_convicted_violation = response.data.officer_own_five_percent_convicted_violation 
            this.officer_own_five_percent_convicted__violation_name = response.data.officer_own_five_percent_convicted__violation_name 
            this.officer_own_five_percent_convicted_violation_date = response.data.officer_own_five_percent_convicted_violation_date
            this.officer_own_five_percent_convicted_violation_offence = response.data.officer_own_five_percent_convicted_violation_offence
            this.officer_own_five_percent_convicted_gambling = response.data.officer_own_five_percent_convicted_gambling 
            this.officer_own_five_percent_convicted__gambling_name = response.data.officer_own_five_percent_convicted__gambling_name 
            this.officer_own_five_percent_convicted_gambling_date = response.data.officer_own_five_percent_convicted_gambling_date
            this.officer_own_five_percent_convicted_gambling_offence = response.data.officer_own_five_percent_convicted_gambling_offence
            this.made_application_similar_license = response.data.made_application_similar_license 
            this.made_application_similar_license_name = response.data.made_application_similar_license_name 
            this.made_application_similar_license_date = response.data.made_application_similar_license_date
            this.made_application_similar_license_offence = response.data.made_application_similar_license_offence                                        
            this.corporation_own_twenty_percent_federal_wagering_stamp = response.data.corporation_own_twenty_percent_federal_wagering_stamp 
            this.law_enforcing_official_interested_business_license_sought = response.data.law_enforcing_official_interested_business_license_sought 
            this.name_of_party = response.data.name_of_party 
            this.five_percent_such_corporation_been_revoked = response.data.five_percent_such_corporation_been_revoked 
            this.five_percent_such_corporation_been_revoked_name_license = response.data.five_percent_such_corporation_been_revoked_name_license 
            this.five_percent_such_corporation_been_revoked_reason = response.data.five_percent_such_corporation_been_revoked_reason 
            this.five_percent_such_corporation_been_revoked_date_revocation = response.data.five_percent_such_corporation_been_revoked_date_revocation                     
            // this.getApplication(response.data.id)
            this.isHide = false
          }  
          // this.getApplication()
        })
        .catch(error => {
          console.log(error)
        });
    },
    getNotes(){
      axios
        .get(`/api/user/applications/${this.application.id}/notes`)
        .then(response => {
          console.log(response)
          this.messages = response.data
        })
    },
    postNote(){
      axios
        .post(`/api/user/applications/${this.application.id}/notes`,{ message: this.form.message })
        .then(response => {
          this.messages.push(response.data.note)
          this.form = {}
          this.errors = []
          this.withError = false          
          console.log(response.data)
        })
        .catch(err => {
          // this.$store.commit("login_failed", 'Wrong email or password.')
          this.errors = err.response.data.errors
          this.withError = true
          console.log({err})
        })         
    }    
  },
  props: ['application', 'formStatus'],
  mounted(){
    console.log(JSON.parse(this.application))
    this.application = JSON.parse(this.application)
    this.getAppData
    this.getNotes()
  },
}
</script>

<style scoped>
.alert-danger {
  display: block;
  margin-top: 10px;
  background: none
}
.uppercase{
  text-align: center !important;
}
.form-group.mt{
  margin-top:50px;
}
.mt-element-list .list-default.ext-1.mt-list-container ul>.mt-list-item:hover{background-color:#e5e5e5}
.btn-default {
  color: #333;
  background-color: #fff;
  border-color: #ccc;
}
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item>.list-datetime {
  text-align: right !important;
  float: right !important;
  width: 91px !important;
  font-size: 10px !important;
}
.mt-element-list .list-simple.mt-list-head {
    padding: 15px;
}
.modal .modal-header {
 border-bottom: 1px solid #EFEFEF;
}    
.mt-list-head{
  background: #2ab4c0!important;
}
.mt-list-container{
  border-left: 1px solid;
  border-right: 1px solid;
  border-bottom: 1px solid;
  border-color: #e7ecf1;
}
.mt-list-container ul{
  margin-bottom: 0;
  padding: 0;  
}
.modal .modal-header .close {
  margin-top: 0!important;
}
      
button.close {
  padding: 0;
  cursor: pointer;
  background: 0 0;
  border: 0;
  -webkit-appearance: none;
}
.mt-element-list .list-simple.ext-1.mt-list-container ul>.mt-list-item.done{
  border-color: #26C281 #26C281 #e7ecf1;
}
.mt-element-list .list-simple.ext-1.mt-list-container ul>.mt-list-item{
  padding: 15px;
  border-left: 3px solid;  
}
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item {
  list-style: none;
  border-bottom: 1px solid;
}
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item>.list-icon-container {
  font-size: 14px;
  float: left;
}
li [class*=" icon-"], li [class^=icon-] {
  top: 1px;
  position: relative;
}        
.icon-check:before {
  content: "\e080";
} 
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item>.list-datetime {
  text-align: right;
  float: right;
  width: 60px;
}
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item>.list-item-content {
  padding: 0 75px 0 60px;
}
.list-item-content a{
  text-shadow: none;
  color: #337ab7;  
}     
.mt-element-list .list-simple.mt-list-head .list-title {
  margin: 0;
  padding-right: 85px;
}
.modal .modal-header h3 {
  font-weight: 300;
  color: white;
}
.modal-title {
  line-height: 1.42857;
}  
.btn-popup{
  position:fixed; 
  bottom: 50px; 
  right: 200px; 
  color: #fff; 
  background-color: #e12330; 
  border-color: #e12330; 
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
