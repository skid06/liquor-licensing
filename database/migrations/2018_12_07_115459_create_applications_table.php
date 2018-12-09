<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->text('class');
            $table->text('license');
            $table->text('fee');
            $table->text('address');
            $table->text('city');
            $table->text('state');
            $table->text('zip');
            $table->text('corporate_name');
            $table->text('corporate_address');
            $table->text('name_business_to_be_conducted');
            $table->text('business_phone');
            $table->text('business_mobile');
            $table->text('business_email');
            $table->text('president_name');
            $table->text('president_address');
            $table->text('president_phone');
            $table->text('president_mobile');
            $table->text('president_email');
            $table->text('vice_president_name');
            $table->text('vice_president_address');
            $table->text('vice_president_phone');
            $table->text('vice_president_mobile');
            $table->text('vice_president_email');  
            $table->text('secretary_name');
            $table->text('secretary_address');
            $table->text('secretary_phone');
            $table->text('secretary_mobile');
            $table->text('secretary_email');   
            $table->text('treasurer_name');
            $table->text('treasurer_address');
            $table->text('treasurer_phone');
            $table->text('treasurer_mobile');
            $table->text('treasurer_email');  
            $table->text('director_name');
            $table->text('director_address');
            $table->text('director_phone');
            $table->text('director_mobile');
            $table->text('director_email');   
            $table->text('vice_director_name');
            $table->text('vice_director_address');
            $table->text('vice_director_phone');
            $table->text('vice_director_mobile');
            $table->text('vice_director_email'); 
            $table->dateTime('date_incorporation'); 
            $table->text('state_incorporation'); 
            $table->text('other_state_incorporation_not_illinois');  
            $table->text('corporation_forth_chapter');
            $table->text('corporation_agent_name');
            $table->text('corporation_agent_address');
            $table->text('corporation_agent_phone');
            $table->text('corporation_agent_mobile');
            $table->text('corporation_agent_email');   
            $table->text('principal_kind_business'); 
            $table->text('applicant_seek_license_alcoholic_restaurant');  
            $table->text('maintained_to_public_meals_served');  
            $table->text('yes_food_services_are');   
            $table->text('serve_suitable_food');    
            $table->text('qualifications_described_illinois_act'); 
            $table->text('applicant_own_premises_license_sought');   
            $table->text('applicant_lease_premises_license_sought');   
            $table->text('lessor_name');  
            $table->text('lessor_address');   
            $table->text('period_covered_lease_from');                                                    
            $table->text('period_covered_lease_to');
            $table->text('applicant_own_premise_license_sought');
            $table->text('applicant_food_dispenser');
            $table->text('applicant_food_dispenser_number_license');
            $table->text('applicant_actively_involved_day_operation');
            $table->text('business_liquor_license_sought_manager');
            $table->text('manager_name');
            $table->text('manager_address');
            $table->text('manager_phone');  
            $table->text('amount_anticipated_liquor_sales');  
            $table->text('applicant_seeking_approval_beer_garden');           
            $table->text('applicant_seeking_approval_outdoor_seating_area');  
            $table->text('location_applicants_business_within_100ft_property_of_church');  
            $table->text('manufacturer_agreed_to_pay_license');  
            $table->text('applicant_engaged_manufacturer_alcoholic_liquors');  
            $table->text('applicant_engaged_manufacturer_alcoholic_liquors_location'); 
            $table->text('applicant_conducting_business_importing_distributor'); 
            $table->text('applicant_conducting_business_importing_distributor_location'); 
            $table->text('officer_own_five_percent_convicted_felony'); 
            $table->text('officer_own_five_percent_convicted__felony_name'); 
            $table->text('officer_own_five_percent_convicted_felony_date');
            $table->text('officer_own_five_percent_convicted_felony_offence'); 
            $table->text('officer_own_five_percent_convicted_violation'); 
            $table->text('officer_own_five_percent_convicted__violation_name'); 
            $table->text('officer_own_five_percent_convicted_violation_date');
            $table->text('officer_own_five_percent_convicted_violation_offence');
            $table->text('officer_own_five_percent_convicted_gambling'); 
            $table->text('officer_own_five_percent_convicted__gambling_name'); 
            $table->text('officer_own_five_percent_convicted_gambling_date');
            $table->text('officer_own_five_percent_convicted_gambling_offence');
            $table->text('made_application_similar_license'); 
            $table->text('made_application_similar_license_name'); 
            $table->text('made_application_similar_license_date');
            $table->text('made_application_similar_license_offence');                                        
            $table->text('corporation_own_twenty_percent_federal_wagering_stamp'); 
            $table->text('law_enforcing_official_interested_business_license_sought'); 
            $table->text('name_of_party'); 
            $table->text('five_percent_such_corporation_been_revoked'); 
            $table->text('five_percent_such_corporation_been_revoked_name_license'); 
            $table->text('five_percent_such_corporation_been_revoked_reason'); 
            $table->text('five_percent_such_corporation_been_revoked_date_revocation'); 
            // $table->string('manager_phone'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
