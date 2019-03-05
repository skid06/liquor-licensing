<?php

namespace App\Http\Repositories;

use App\User;
use Carbon\Carbon;
use App\Application;
use App\Http\Repositories\Interfaces\ApplicationInterface;

class LiquorRepository implements ApplicationInterface
{
	private $application;
	
	public function __construct(Application $application)
	{
		$this->application = $application;
	}

	public function store(array $attributes)
	{
		if(!$attributes['app_id']){
			$application = new Application;
		}
		else{
			$application = Application::find($attributes['app_id']);
		}

		$application->class = $attributes['class'];
		$application->user_id = \Auth::user()->id;
		$application->license = $attributes['license'];
		$application->fee = $attributes['fee'];
		$application->address = $attributes['address'];
		$application->city = $attributes['city'];
		$application->state = $attributes['state'];
		$application->zip = $attributes['zip'];
		$application->corporate_name = $attributes['corporate_name'];
		$application->corporate_address = $attributes['corporate_address'];
		$application->name_business_to_be_conducted = $attributes['name_business_to_be_conducted'];
		$application->business_phone = $attributes['business_phone'];
		$application->business_mobile = $attributes['business_mobile'];
		$application->business_email = $attributes['business_email'];
		$application->president_name = $attributes['president_name'];
		$application->president_address = $attributes['president_address'];
		$application->president_phone = $attributes['president_phone'];
		$application->president_mobile = $attributes['president_mobile'];
		$application->president_email = $attributes['president_email'];
		$application->vice_president_name = $attributes['vice_president_name'];
		$application->vice_president_address = $attributes['vice_president_address'];
		$application->vice_president_phone = $attributes['vice_president_phone'];
		$application->vice_president_mobile = $attributes['vice_president_mobile'];
		$application->vice_president_email = $attributes['vice_president_email'];  
		$application->secretary_name = $attributes['secretary_name'];
		$application->secretary_address = $attributes['secretary_address'];
		$application->secretary_phone = $attributes['secretary_phone'];
		$application->secretary_mobile = $attributes['secretary_mobile'];
		$application->secretary_email = $attributes['secretary_email'];
		$application->treasurer_name = $attributes['treasurer_name'];
		$application->treasurer_address = $attributes['treasurer_address'];
		$application->treasurer_phone = $attributes['treasurer_phone'];
		$application->treasurer_mobile = $attributes['treasurer_mobile'];
		$application->treasurer_email = $attributes['treasurer_email'];
		$application->director_name = $attributes['director_name'];
		$application->director_address = $attributes['director_address'];
		$application->director_phone = $attributes['director_phone'];
		$application->director_mobile = $attributes['director_mobile'];
		$application->director_email = $attributes['director_email'];
		$application->vice_director_name = $attributes['vice_president_name'];
		$application->vice_director_address = $attributes['vice_president_address'];
		$application->vice_director_phone = $attributes['vice_president_phone'];
		$application->vice_director_mobile = $attributes['vice_president_mobile'];
		$application->vice_director_email = $attributes['vice_president_email'];
		$application->date_incorporation = $attributes['date_incorporation'];
		$application->state_incorporation = $attributes['state_incorporation']; 
		$application->other_state_incorporation_not_illinois = $attributes['other_state_incorporation_not_illinois'];
		$application->corporation_forth_chapter = $attributes['corporation_forth_chapter'];
		$application->corporation_agent_name = $attributes['corporation_agent_name'];
		$application->corporation_agent_address = $attributes['corporation_agent_address'];
		$application->corporation_agent_phone = $attributes['corporation_agent_phone'];
		$application->corporation_agent_mobile = $attributes['corporation_agent_mobile'];
		$application->corporation_agent_email = $attributes['corporation_agent_email'];
		$application->principal_kind_business = $attributes['principal_kind_business'];
		$application->applicant_seek_license_alcoholic_restaurant = $attributes['applicant_seek_license_alcoholic_restaurant'];
		$application->maintained_to_public_meals_served = $attributes['maintained_to_public_meals_served'];
		$application->yes_food_services_are = $attributes['yes_food_services_are'];   
		$application->serve_suitable_food = $attributes['serve_suitable_food'];
		$application->qualifications_described_illinois_act = $attributes['qualifications_described_illinois_act'];
		$application->applicant_own_premises_license_sought = $attributes['applicant_own_premises_license_sought'];
		$application->applicant_lease_premises_license_sought = $attributes['applicant_lease_premises_license_sought'];
		$application->lessor_name = $attributes['lessor_name'];
		$application->lessor_address = $attributes['lessor_address'];
		$application->period_covered_lease_from = $attributes['period_covered_lease_from'];                                               
		$application->period_covered_lease_to = $attributes['period_covered_lease_to'];
		$application->applicant_own_premise_license_sought = $attributes['applicant_own_premise_license_sought'];
		$application->applicant_food_dispenser = $attributes['applicant_food_dispenser'];
		$application->applicant_food_dispenser_number_license = $attributes['applicant_food_dispenser_number_license'];
		$application->applicant_actively_involved_day_operation = $attributes['applicant_actively_involved_day_operation'];
		$application->business_liquor_license_sought_manager = $attributes['business_liquor_license_sought_manager'];
		$application->manager_name = $attributes['manager_name'];
		$application->manager_address = $attributes['manager_address'];
		$application->manager_phone = $attributes['manager_phone'];
		$application->amount_anticipated_liquor_sales = $attributes['amount_anticipated_liquor_sales'];  
		$application->applicant_seeking_approval_beer_garden = $attributes['applicant_seeking_approval_beer_garden'];
		$application->applicant_seeking_approval_outdoor_seating_area = $attributes['applicant_seeking_approval_outdoor_seating_area'];
		$application->location_applicants_business_within_100ft_property_of_church = $attributes['location_applicants_business_within_100ft_property_of_church'];  
		$application->manufacturer_agreed_to_pay_license = $attributes['manufacturer_agreed_to_pay_license'];
		$application->applicant_engaged_manufacturer_alcoholic_liquors = $attributes['applicant_engaged_manufacturer_alcoholic_liquors'];
		$application->applicant_engaged_manufacturer_alcoholic_liquors_location = $attributes['applicant_engaged_manufacturer_alcoholic_liquors_location'];
		$application->applicant_conducting_business_importing_distributor = $attributes['applicant_conducting_business_importing_distributor'];
		$application->applicant_conducting_business_importing_distributor_location = $attributes['applicant_conducting_business_importing_distributor_location'];
		$application->officer_own_five_percent_convicted_felony = $attributes['officer_own_five_percent_convicted_felony'];
		$application->officer_own_five_percent_convicted__felony_name = $attributes['officer_own_five_percent_convicted__felony_name'];
		$application->officer_own_five_percent_convicted_felony_date = $attributes['officer_own_five_percent_convicted_felony_date'];
		$application->officer_own_five_percent_convicted_felony_offence = $attributes['officer_own_five_percent_convicted_felony_offence'];
		$application->officer_own_five_percent_convicted_violation = $attributes['officer_own_five_percent_convicted_violation'];
		$application->officer_own_five_percent_convicted__violation_name = $attributes['officer_own_five_percent_convicted_violation_name'];
		$application->officer_own_five_percent_convicted_violation_date = $attributes['officer_own_five_percent_convicted_violation_date'];
		$application->officer_own_five_percent_convicted_violation_offence = $attributes['officer_own_five_percent_convicted_violation_offence'];
		$application->officer_own_five_percent_convicted_gambling = $attributes['officer_own_five_percent_convicted_gambling']; 
		$application->officer_own_five_percent_convicted__gambling_name = $attributes['officer_own_five_percent_convicted__gambling_name']; 
		$application->officer_own_five_percent_convicted_gambling_date = $attributes['officer_own_five_percent_convicted_gambling_date'];
		$application->officer_own_five_percent_convicted_gambling_offence = $attributes['officer_own_five_percent_convicted_gambling_offence'];
		$application->made_application_similar_license = $attributes['made_application_similar_license']; 
		$application->made_application_similar_license_name = $attributes['made_application_similar_license_name']; 
		$application->made_application_similar_license_date = $attributes['made_application_similar_license_date'];
		$application->made_application_similar_license_offence = $attributes['made_application_similar_license_offence'];                                        
		$application->corporation_own_twenty_percent_federal_wagering_stamp = $attributes['corporation_own_twenty_percent_federal_wagering_stamp']; 
		$application->law_enforcing_official_interested_business_license_sought = $attributes['law_enforcing_official_interested_business_license_sought']; 
		$application->name_of_party = $attributes['name_of_party']; 
		$application->five_percent_such_corporation_been_revoked = $attributes['five_percent_such_corporation_been_revoked']; 
		$application->five_percent_such_corporation_been_revoked_name_license = $attributes['five_percent_such_corporation_been_revoked_name_license']; 
		$application->five_percent_such_corporation_been_revoked_reason = $attributes['five_percent_such_corporation_been_revoked_reason']; 
		$application->five_percent_such_corporation_been_revoked_date_revocation = $attributes['five_percent_such_corporation_been_revoked_date_revocation'];    
		$application->save();
		
		return $application;
    }

	public function show($id)
	{

  }
 
	/**
	 * Used in Admin Dashboard to get all applications
	 * Also used in Official dashboard to search/get the completed applications
	 * @param $status, $search
	 */
	public function getApplications($status, $search = null)
	{

		if($search == null){
			$applications = $this->application
													->where('status', $status)
													->with('user')
													->paginate(5);
		}
		else {
			$applications = $this->application
													->where('status', $status)
													->where('corporate_name', 'LIKE', '%'.$status.'%')
													->with('user')
													->paginate(5);			
		}

		return response()->json(['applications' => $applications]);
	}
	
	/**
	 * Used by authenticated user to get its applications
	 * @param $status, $all
	 */
	public function authUserApplications(string $status, string $get)
	{
		if($get === 'yes'){
			$applications = $this->application
								->where("user_id", \Auth::user()->id)
								->get();
		}
		else {
			if($status === 'all'){
				$applications = $this->application
														->where('user_id', \Auth::user()->id)
														->where('corporate_name', "LIKE", "%$status%")
														->paginate(5);					
			}
			else {
				$applications = $this->application
														->where('user_id', \Auth::user()->id)
														->where('status', $status)
														->paginate(5);	
			}
		
		}
		return response()->json(['applications' => $applications]);
    }	
 
	public function filterApplicationByDate($by, $count, $status)
	{
		if($by === 'day'){
			if(is_numeric($count) && $count >= 1){
				if($status === 'all'){
						$applications = $this->application
																->whereDate('created_at', '>=', Carbon::now()->subDays($count))
																->paginate(5);                      
				}
				else {
						$applications = $this->application
																->where('status', $status)
																->whereDate('created_at', '>=', Carbon::now()->subDays($count))
																->paginate(5); 
				}

				return response()->json(["applications" => $applications]);

			}
				
		}
		elseif($by === 'month'){
				if(is_numeric($count) && $count >= 1){
						if($status === 'all'){
								$applications = $this->application
																->whereDate('created_at', '>=', Carbon::now()->subMonths($count))
																->paginate(5); 
						}
						else {
								$applications = $this->application
																->where('status', $status)
																->whereDate('created_at', '>=', Carbon::now()->subMonths($count))
																->paginate(5); 
						}


						return response()->json(["applications" => $applications]);

				}         
		}
		elseif($by === 'year'){
				if(is_numeric($count) && $count >= 1){
						if($status === 'all'){
								$applications = $this->application
																->where('created_at', '>=', Carbon::now()->subYears($count))
																->paginate(5);
						}
						else {
								$applications = $this->application
																->where('status', $status)
																->where('created_at', '>=', Carbon::now()->subYears($count))
																->paginate(5); 
						}                               
						
						return response()->json(["applications" => $applications]);
										
				}           
		}
		else{
				return 'Parameters not allowed.';
		}              
    }
}