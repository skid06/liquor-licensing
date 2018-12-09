<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;

class LiquorLicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $application = Application::where('user_id', \Auth::user()->id)->first();

        if(!empty($application)){
            return $application;
        }
        else{
            return 'No data';
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        if(!$request->app_id){
            $application = new Application;
        }
        else{
            $application = Application::find($request->app_id);
        }

        $application->class = $request->class;
        $application->user_id = \Auth::user()->id;
        $application->license = $request->license;
        $application->fee = $request->fee;
        $application->address = $request->address;
        $application->city = $request->city;
        $application->state = $request->state;
        $application->zip = $request->zip;
        $application->corporate_name = $request->corporate_name;
        $application->corporate_address = $request->corporate_address;
        $application->name_business_to_be_conducted = $request->name_business_to_be_conducted;
        $application->business_phone = $request->business_phone;
        $application->business_mobile = $request->business_mobile;
        $application->business_email = $request->business_email;
        $application->president_name = $request->president_name;
        $application->president_address = $request->president_address;
        $application->president_phone = $request->president_phone;
        $application->president_mobile = $request->president_mobile;
        $application->president_email = $request->president_email;
        $application->vice_president_name = $request->vice_president_name;
        $application->vice_president_address = $request->vice_president_address;
        $application->vice_president_phone = $request->vice_president_phone;
        $application->vice_president_mobile = $request->vice_president_mobile;
        $application->vice_president_email = $request->vice_president_email;  
        $application->secretary_name = $request->secretary_name;
        $application->secretary_address = $request->secretary_address;
        $application->secretary_phone = $request->secretary_phone;
        $application->secretary_mobile = $request->secretary_mobile;
        $application->secretary_email = $request->secretary_email;
        $application->treasurer_name = $request->treasurer_name;
        $application->treasurer_address = $request->treasurer_address;
        $application->treasurer_phone = $request->treasurer_phone;
        $application->treasurer_mobile = $request->treasurer_mobile;
        $application->treasurer_email = $request->treasurer_email;
        $application->director_name = $request->director_name;
        $application->director_address = $request->director_address;
        $application->director_phone = $request->director_phone;
        $application->director_mobile = $request->director_mobile;
        $application->director_email = $request->director_email;
        $application->vice_director_name = $request->vice_president_name;
        $application->vice_director_address = $request->vice_president_address;
        $application->vice_director_phone = $request->vice_president_phone;
        $application->vice_director_mobile = $request->vice_president_mobile;
        $application->vice_director_email = $request->vice_president_email;
        $application->date_incorporation = $request->date_incorporation;
        $application->state_incorporation = $request->state_incorporation; 
        $application->other_state_incorporation_not_illinois = $request->other_state_incorporation_not_illinois;
        $application->corporation_forth_chapter = $request->corporation_forth_chapter;
        $application->corporation_agent_name = $request->corporation_agent_name;
        $application->corporation_agent_address = $request->corporation_agent_address;
        $application->corporation_agent_phone = $request->corporation_agent_phone;
        $application->corporation_agent_mobile = $request->corporation_agent_mobile;
        $application->corporation_agent_email = $request->corporation_agent_email;
        $application->principal_kind_business = $request->principal_kind_business;
        $application->applicant_seek_license_alcoholic_restaurant = $request->applicant_seek_license_alcoholic_restaurant;
        $application->maintained_to_public_meals_served = $request->maintained_to_public_meals_served;
        $application->yes_food_services_are = $request->yes_food_services_are;   
        $application->serve_suitable_food = $request->serve_suitable_food;
        $application->qualifications_described_illinois_act = $request->qualifications_described_illinois_act;
        $application->applicant_own_premises_license_sought = $request->applicant_own_premises_license_sought;
        $application->applicant_lease_premises_license_sought = $request->applicant_lease_premises_license_sought;
        $application->lessor_name = $request->lessor_name;
        $application->lessor_address = $request->lessor_address;
        $application->period_covered_lease_from = $request->period_covered_lease_from;                                               
        $application->period_covered_lease_to = $request->period_covered_lease_to;
        $application->applicant_own_premise_license_sought = $request->applicant_own_premise_license_sought;
        $application->applicant_food_dispenser = $request->applicant_food_dispenser;
        $application->applicant_food_dispenser_number_license = $request->applicant_food_dispenser_number_license;
        $application->applicant_actively_involved_day_operation = $request->applicant_actively_involved_day_operation;
        $application->business_liquor_license_sought_manager = $request->business_liquor_license_sought_manager;
        $application->manager_name = $request->manager_name;
        $application->manager_address = $request->manager_address;
        $application->manager_phone = $request->manager_phone;
        $application->amount_anticipated_liquor_sales = $request->amount_anticipated_liquor_sales;  
        $application->applicant_seeking_approval_beer_garden = $request->applicant_seeking_approval_beer_garden;
        $application->applicant_seeking_approval_outdoor_seating_area = $request->applicant_seeking_approval_outdoor_seating_area;
        $application->location_applicants_business_within_100ft_property_of_church = $request->location_applicants_business_within_100ft_property_of_church;  
        $application->manufacturer_agreed_to_pay_license = $request->manufacturer_agreed_to_pay_license;
        $application->applicant_engaged_manufacturer_alcoholic_liquors = $request->applicant_engaged_manufacturer_alcoholic_liquors;
        $application->applicant_engaged_manufacturer_alcoholic_liquors_location = $request->applicant_engaged_manufacturer_alcoholic_liquors_location;
        $application->applicant_conducting_business_importing_distributor = $request->applicant_conducting_business_importing_distributor;
        $application->applicant_conducting_business_importing_distributor_location = $request->applicant_conducting_business_importing_distributor_location;
        $application->officer_own_five_percent_convicted_felony = $request->officer_own_five_percent_convicted_felony;
        $application->officer_own_five_percent_convicted__felony_name = $request->officer_own_five_percent_convicted__felony_name;
        $application->officer_own_five_percent_convicted_felony_date = $request->officer_own_five_percent_convicted_felony_date;
        $application->officer_own_five_percent_convicted_felony_offence = $request->officer_own_five_percent_convicted_felony_offence;
        $application->officer_own_five_percent_convicted_violation = $request->officer_own_five_percent_convicted_violation;
        $application->officer_own_five_percent_convicted__violation_name = $request->officer_own_five_percent_convicted_violation_name;
        $application->officer_own_five_percent_convicted_violation_date = $request->officer_own_five_percent_convicted_violation_date;
        $application->officer_own_five_percent_convicted_violation_offence = $request->officer_own_five_percent_convicted_violation_offence;
        $application->officer_own_five_percent_convicted_gambling = $request->officer_own_five_percent_convicted_gambling; 
        $application->officer_own_five_percent_convicted__gambling_name = $request->officer_own_five_percent_convicted__gambling_name; 
        $application->officer_own_five_percent_convicted_gambling_date = $request->officer_own_five_percent_convicted_gambling_date;
        $application->officer_own_five_percent_convicted_gambling_offence = $request->officer_own_five_percent_convicted_gambling_offence;
        $application->made_application_similar_license = $request->made_application_similar_license; 
        $application->made_application_similar_license_name = $request->made_application_similar_license_name; 
        $application->made_application_similar_license_date = $request->made_application_similar_license_date;
        $application->made_application_similar_license_offence = $request->made_application_similar_license_offence;                                        
        $application->corporation_own_twenty_percent_federal_wagering_stamp = $request->corporation_own_twenty_percent_federal_wagering_stamp; 
        $application->law_enforcing_official_interested_business_license_sought = $request->law_enforcing_official_interested_business_license_sought; 
        $application->name_of_party = $request->name_of_party; 
        $application->five_percent_such_corporation_been_revoked = $request->five_percent_such_corporation_been_revoked; 
        $application->five_percent_such_corporation_been_revoked_name_license = $request->five_percent_such_corporation_been_revoked_name_license; 
        $application->five_percent_such_corporation_been_revoked_reason = $request->five_percent_such_corporation_been_revoked_reason; 
        $application->five_percent_such_corporation_been_revoked_date_revocation = $request->five_percent_such_corporation_been_revoked_date_revocation;    
        $application->save();
        
        return $application;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
