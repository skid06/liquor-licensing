<?php

namespace App\Http\Repositories;

use App\User;
use Carbon\Carbon;
use App\Corporation;
use App\Partnership;
use App\LiquorApplication;
use App\LimitedLiabilityCompany;
use App\PartnershipOwners as Owner;
use App\CorporationShareholder as Shareholder;
use App\LimitedLiabilityCompanyMember as Member;
use App\Http\Repositories\Interfaces\ApplicationInterface;
use App\Http\Repositories\Interfaces\BusinessClassificationInterface;

class LiquorApplicationRepository implements ApplicationInterface
{

	public function store($attributes)
	{
		if(!$attributes['app_id']){
			$application = new LiquorApplication;
		}
		else{
			$application = LiquorApplication::find($attributes['app_id']);
		}

		$application->user_id = \Auth::user()->id;
		$application->business_name = $attributes['business_name'];
		$application->business_address = $attributes['business_address'];
		$application->business_phone = $attributes['business_phone'];
		$application->business_email = $attributes['business_email'];
		$application->business_classification = $attributes['business_classification'];
		$application->business_contact_person = $attributes['business_contact_person'];
		$application->business_contact_title = $attributes['business_contact_title'];
		$application->business_contact_phone = $attributes['business_contact_phone'];
		$application->born_outside_us = $attributes['born_outside_us'];
		$application->born_us_parents = $attributes['born_us_parents'];
		$application->date_of_birth = $attributes['date_of_birth'];
		$application->naturalized = $attributes['naturalized'];
		$application->birth_country = $attributes['birth_country'];
		$application->naturalized_city = $attributes['naturalized_city'];
		$application->naturalized_state = $attributes['naturalized_state'];
		$application->naturalized_date = $attributes['naturalized_date'];
		$application->owner_lease_premises = $attributes['owner_lease_premises'];
		$application->establishment_owner_name = $attributes['establishment_owner_name'];
		$application->establishment_owner_address = $attributes['establishment_owner_address'];
		$application->establishment_owner_phone = $attributes['establishment_owner_phone'];
		$application->lessor_name = $attributes['lessor_name'];
		$application->lessor_address = $attributes['lessor_address'];
		$application->lessor_phone = $attributes['lessor_phone'];
		$application->lessor_end_date = $attributes['lessor_end_date'];  
		$application->liquor_license_another_premise = $attributes['liquor_license_another_premise'];
		$application->other_establishment_name = $attributes['other_establishment_name'];
		$application->other_establishment_address = $attributes['other_establishment_address'];
		$application->action_pending_against_owner = $attributes['action_pending_against_owner'];
		$application->owner_been_issued_wagering_stamp = $attributes['owner_been_issued_wagering_stamp'];
		$application->previous_liquor_license_been_revoked = $attributes['previous_liquor_license_been_revoked'];
		$application->status = $attributes['status'];
    
    if($attributes['business_classification'] == 'Corporation') {
      if(!$attributes['app_id']){
        $corporation = new Corporation;
      }
      else {
        $corporation = Corporation::findOrFail($application->classifiable_id);
			}
			$corporation->corporate_name = $attributes['corporate_name'];
      $corporation->corporate_address = $attributes['corporate_address'];
      $corporation->store_manager_name = $attributes['store_manager_name'];
      $corporation->store_manager_address = $attributes['store_manager_address'];
      $corporation->store_manager_phone = $attributes['store_manager_phone'];
			$corporation->store_manager_email = $attributes['store_manager_email'];
      $corporation->president_name = $attributes['president_name'];
      $corporation->president_address = $attributes['president_address'];
      $corporation->president_phone = $attributes['president_phone'];
      $corporation->president_email = $attributes['president_email'];			
      $corporation->vice_president_name = $attributes['vice_president_name'];
      $corporation->vice_president_address = $attributes['vice_president_address'];
      $corporation->vice_president_phone = $attributes['vice_president_phone'];
      $corporation->vice_president_email = $attributes['vice_president_email'];
      $corporation->secretary_name = $attributes['secretary_name'];
      $corporation->secretary_address = $attributes['secretary_address'];
      $corporation->secretary_phone = $attributes['secretary_phone'];
      $corporation->secretary_email = $attributes['secretary_email'];
      $corporation->treasurer_name = $attributes['treasurer_name'];
      $corporation->treasurer_address = $attributes['treasurer_address'];
      $corporation->treasurer_phone = $attributes['treasurer_phone'];
			$corporation->treasurer_email = $attributes['treasurer_email'];   
			
			$corporation->save();     

			$application->classifiable_id = $corporation->id;
			$application->classifiable_type = 'App\Corporation';

			if(!empty($attributes->input('shareholders'))){
				foreach($attributes->input('shareholders') as $shareholder){
					if(isset($shareholder['id'])){
						$dbShareholder = Shareholder::find($shareholder['id']);
					}
					else {
						$dbShareholder = new Shareholder;
					}					

					$dbShareholder->name = $shareholder['name'];
					$dbShareholder->address = $shareholder['address'];
					$dbShareholder->percentage_owned = $shareholder['percentage_owned'];
					$dbShareholder->corporation_id = $corporation->id;
					$dbShareholder->save();
				}
			}			
    }
		elseif($attributes['business_classification'] ==  'Limited Liability Company'){
      if(!$attributes['app_id']){
        $llc = new LimitedLiabilityCompany;
      }
      else {
        $llc = LimitedLiabilityCompany::findOrFail($application->classifiable_id);
			}
			
			$llc->state_of_organization = $attributes['state_of_organization'];
			$llc->llc_manager_name = $attributes['llc_manager_name'];
			$llc->llc_manager_email = $attributes['llc_manager_email'];
			$llc->llc_manager_phone = $attributes['llc_manager_phone'];
			$llc->store_manager_name = $attributes['store_manager_name'];
			$llc->store_manager_email = $attributes['store_manager_email'];
			$llc->store_manager_phone = $attributes['store_manager_phone'];
			$llc->store_manager_address = $attributes['store_manager_address'];

			$llc->save();

			$application->classifiable_id = $llc->id;
			$application->classifiable_type = 'App\LimitedLiabilityCompany';

			if(!empty($attributes->input('members'))){
				foreach($attributes->input('members') as $member){
					if(isset($member['id'])){
						$dbMember = Member::find($member['id']);
					}
					else {
						$dbMember = new Member;
					}

					$dbMember->name = $member['name'];
					$dbMember->address = $member['address'];
					$dbMember->email = $member['email'];
					$dbMember->phone = $member['phone'];
					$dbMember->llc_id = $llc->id;
					$dbMember->save();
				}
			}				
    }
		else {
      if(!$attributes['app_id']){
        $partnership = new Partnership;
      }
      else {
        $partnership = Partnership::findOrFail($application->classifiable_id);
			}

			$partnership->type = $attributes['business_classification'];
			$partnership->save();

			$application->classifiable_id = $partnership->id;
			$application->classifiable_type = 'App\Partnership';

			if(!empty($attributes->input('owners'))){
				foreach($attributes->input('owners') as $owner){
					if(isset($owner['id'])){
						$dbOwner = Owner::find($owner['id']);
					}
					else {
						$dbOwner = new Owner;
					}

					$dbOwner->name = $owner['name'];
					$dbOwner->email = $owner['email'];
					$dbOwner->address = $owner['address'];
					$dbOwner->percentage_owned = $owner['percentage_owned'];
					$dbOwner->partnership_id = $partnership->id;
					$dbOwner->save();
				}		
			}	
		}
		
		$application->save();

		return response()->json(['application' => $application]);
  }

	/**
	 * Used to get user application by id
	 * @param $status, $all
	 */	
	public function getApplicationById($id)
	{
		if(\Auth::user()){
			$application = LiquorApplication::where('id', $id)
																			->where('user_id', \Auth::user()->id)
																			->with('classifiable.children')
																			->first();															
		}
		else{
			$application = LiquorApplication::where('id', $id)
																			->with('classifiable')
																			->first();
		}

    return response()->json(['application' => $application]);
  }
 
	/**
	 * Used in Admin Dashboard to get all applications
	 * Also used in Official dashboard to search/get the completed applications
	 * @param $status, $search
	 */
	public function getApplications($search = null)
	{

		if($search == null){
			$applications = LiquorApplication::with('user')
													->get();
		}
		else {
			$applications = LiquorApplication::where('corporate_name', 'LIKE', '%'.$status.'%')
													->with('user')
													->get();			
		}

		return response()->json(['applications' => $applications]);
	}
	
	/**
	 * Used by authenticated user to get its applications by status and/or search
	 * @param $status, $all
	 */
	public function authUserApplications(string $status, string $search = null)
	{
		if($search == null){
			$applications = LiquorApplication::where('status', $status)
																				->where("user_id", \Auth::user()->id)
																				->get();																	
		}
		else{
			$applications = LiquorApplication::where('status', $status)
																				->where("user_id", \Auth::user()->id)
																				->where("business_name", "LIKE", "%$search%")
																				->get();
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
	
	public function processApplication($id)
	{
			$app = Application::where('id', $id)->with('user')->first();

			$app->status = 'processed';
			$app->save();

			// Send Email Alert to user when application has been processed.
			event(new UserApplicationProcessed($app));

			return $app;
	}	
}