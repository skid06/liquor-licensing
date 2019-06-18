<?php

namespace App\Http\Repositories;

use PDF;
use Mail;
use App\User;
use Carbon\Carbon;
use App\Corporation;
use App\Partnership;
use App\LiquorApplication;
use App\LimitedLiabilityCompany;
use App\PartnershipOwners as Owner;
use App\CorporationShareholder as Shareholder;
use App\LimitedLiabilityCompanyMember as Member;
use App\Events\UserApplicationProcessed;
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
		$application->class_fee_id = $attributes['class_fee'];
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
																			->with(['classifiable.children'])
																			->first();															
		}
		else{
			$application = LiquorApplication::where('id', $id)
																			->with(['classifiable.children'])
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
			$app = LiquorApplication::where('id', $id)->with('user')->first();

			$app->status = 'processed';
			$app->save();
			// return $app;

			// Send Email Alert to user when application has been processed.
			event(new UserApplicationProcessed($app));

			return $app;
	}	

	public function sendEmailWithPDF($attributes)
	{ 
		$data = json_decode($attributes, true);
		// return $attributes['pdfData'];
		$data['pdf'] = [
			'business_name' =>  $attributes['pdfData']['business_name'],
			'business_address' =>  $attributes['pdfData']['business_address'],
			'business_phone' =>  $attributes['pdfData']['business_phone'],
			'business_email' =>  $attributes['pdfData']['business_email'],
			'business_contact_person' =>  $attributes['pdfData']['business_contact_person'],
			'business_contact_phone' =>  $attributes['pdfData']['business_contact_phone'],
			'business_contact_title' =>  $attributes['pdfData']['business_contact_title'],            
			'business_classification' =>  $attributes['pdfData']['business_classification'],
			// 'selectClassification($attributes['pdfData']['business_classification)   
			'born_outside_us' =>  $attributes['pdfData']['born_outside_us'],
			'born_us_parents' =>  $attributes['pdfData']['born_us_parents'],
			'date_of_birth' =>  $attributes['pdfData']['date_of_birth'],
			'birth_country' =>  $attributes['pdfData']['birth_country'],   
			'naturalized' =>  $attributes['pdfData']['naturalized'],      
			'naturalized_city' =>  $attributes['pdfData']['naturalized_city'],
			'naturalized_state' =>  $attributes['pdfData']['naturalized_state'],
			'naturalized_date' =>  $attributes['pdfData']['naturalized_date'],              
			'business_contact_person' =>  $attributes['pdfData']['business_contact_person'],
			'business_contact_title' =>  $attributes['pdfData']['business_contact_title'],
			'business_contact_phone' =>  $attributes['pdfData']['business_contact_phone'],
			'class_fee' =>  $attributes['pdfData']['class_fee'],
			'classifiable_type' => $attributes['pdfData']['classifiable_type'],

			'corporate_name' => isset($attributes['pdfData']['corporate_name']) ? $attributes['pdfData']['corporate_name'] : 'none',
			'corporate_address' => isset($attributes['pdfData']['corporate_address']) ? $attributes['pdfData']['corporate_address'] : 'none',
			'store_manager_name' => isset($attributes['pdfData']['store_manager_name']) ? $attributes['pdfData']['store_manager_name']: 'none',
			'store_manager_email' => isset($attributes['pdfData']['store_manager_email']) ? $attributes['pdfData']['store_manager_email'] : 'none',
			'store_manager_address' => isset($attributes['pdfData']['store_manager_address']) ? $attributes['pdfData']['store_manager_address'] : 'none',
			'store_manager_phone' => isset($attributes['pdfData']['store_manager_phone']) ? $attributes['pdfData']['store_manager_phone'] : 'none',              
			'president_name' => isset($attributes['pdfData']['president_name']) ? $attributes['pdfData']['president_name'] : 'none',
			'president_email' => isset($attributes['pdfData']['president_email']) ? $attributes['pdfData']['president_email'] : 'none',
			'president_address' => isset($attributes['pdfData']['president_address']) ? $attributes['pdfData']['president_address'] : 'none',
			'president_phone' => isset($attributes['pdfData']['president_phone']) ? $attributes['pdfData']['president_phone'] : 'none',
			'vice_president_name' => isset($attributes['pdfData']['vice_president_name']) ? $attributes['pdfData']['vice_president_name'] : 'none',
			'vice_president_email' => isset($attributes['pdfData']['vice_president_email']) ? $attributes['pdfData']['vice_president_email'] : 'none',
			'vice_president_address' => isset($attributes['pdfData']['vice_president_address']) ? $attributes['pdfData']['vice_president_address'] : 'none',
			'vice_president_phone' => isset($attributes['pdfData']['vice_president_phone']) ? $attributes['pdfData']['vice_president_phone'] : 'none',
			'secretary_name' => isset($attributes['pdfData']['secretary_name']) ? $attributes['pdfData']['secretary_name'] : 'none',
			'secretary_email' => isset($attributes['pdfData']['secretary_email']) ? $attributes['pdfData']['secretary_email'] : 'none',
			'secretary_address' => isset($attributes['pdfData']['secretary_address']) ? $attributes['pdfData']['secretary_address'] : 'none',
			'secretary_phone' => isset($attributes['pdfData']['secretary_phone']) ? $attributes['pdfData']['secretary_phone'] : 'none',
			'treasurer_name' => isset($attributes['pdfData']['treasurer_name']) ? $attributes['pdfData']['treasurer_name'] : 'none',
			'treasurer_email' => isset($attributes['pdfData']['treasurer_address']) ? $attributes['pdfData']['treasurer_address'] : 'none',
			'treasurer_address' => isset($attributes['pdfData']['treasurer_address']) ? $attributes['pdfData']['treasurer_address'] : 'none',
			'treasurer_phone' => isset($attributes['pdfData']['treasurer_phone']) ? $attributes['pdfData']['treasurer_phone'] : 'none',
			'shareholders' => isset($attributes['pdfData']['shareholders']) ? $attributes['pdfData']['shareholders']: 'none',
			// 'shareholders' => isset($attributes['pdfData']['children']) ? $attributes['pdfData']['children'] : 'none',

			// 'classifiable_type' => $attributes['pdfData']['classifiable_type'],

			'state_of_organization' => isset($attributes['pdfData']['state_of_organization']) ? $attributes['pdfData']['state_of_organization'] : 'none',
			'llc_manager_name' => isset($attributes['pdfData']['llc_manager_name']) ? $attributes['pdfData']['llc_manager_name'] : 'none',
			'llc_manager_email' => isset($attributes['pdfData']['llc_manager_email']) ? $attributes['pdfData']['llc_manager_email'] : 'none',
			'llc_manager_phone' => isset($attributes['pdfData']['llc_manager_phone']) ? $attributes['pdfData']['llc_manager_phone'] : 'none',
			'store_manager_name' => isset($attributes['pdfData']['store_manager_name']) ? $attributes['pdfData']['store_manager_name'] : 'none',
			'store_manager_email' => isset($attributes['pdfData']['store_manager_email']) ? $attributes['pdfData']['store_manager_email'] : 'none',
			'store_manager_address' => isset($attributes['pdfData']['store_manager_address']) ? $attributes['pdfData']['store_manager_address'] : 'none',
			'store_manager_phone' => isset($attributes['pdfData']['store_manager_phone']) ? $attributes['pdfData']['store_manager_phone'] : 'none',
			'owners' => isset($attributes['pdfData']['owners']) ? $attributes['pdfData']['owners'] : 'none',            

			// 'state_of_organization' => $attributes['pdfData']['state_of_organization'],
			// 'llc_manager_name' => $attributes['pdfData']['llc_manager_name'],
			// 'llc_manager_email' => $attributes['pdfData']['llc_manager_email'],
			// 'llc_manager_phone' => $attributes['pdfData']['llc_manager_phone'],
			// 'store_manager_name' => $attributes['pdfData']['store_manager_name'],
			// 'store_manager_email' => $attributes['pdfData']['store_manager_email'],
			// 'store_manager_address' => $attributes['pdfData']['store_manager_address'],
			// 'store_manager_phone' => $attributes['pdfData']['store_manager_phone'],              
			'members' => isset($attributes['pdfData']['members']) ? $attributes['pdfData']['members'] : 'none',

			'other_corporate_name' => isset($attributes['pdfData']['other_corporate_name']) ? $attributes['pdfData']['other_corporate_name'] : 'none',
			'other_corporate_address' => isset($attributes['pdfData']['other_corporate_address']) ? $attributes['pdfData']['other_corporate_address'] : 'none',

			'date_qualified_transact_business' => isset($attributes['pdfData']['date_qualified_transact_business']) ? $attributes['pdfData']['date_qualified_transact_business'] : 'none',
			'had_business_other_corporation' => isset($attributes['pdfData']['had_business_other_corporation']) ? $attributes['pdfData']['had_business_other_corporation'] : 'none',
			'establishment_owner_name' => isset($attributes['pdfData']['establishment_owner_name']) ? $attributes['pdfData']['establishment_owner_name'] : 'none',
			'establishment_owner_address' => isset($attributes['pdfData']['establishment_owner_address']) ? $attributes['pdfData']['establishment_owner_address'] : 'none',
			'establishment_owner_phone' => isset($attributes['pdfData']['establishment_owner_phone']) ? $attributes['pdfData']['establishment_owner_phone'] : 'none',
			'lessor_name' => isset($attributes['pdfData']['lessor_name']) ? $attributes['pdfData']['lessor_name'] : 'none',
			'lessor_address' => isset($attributes['pdfData']['lessor_address']) ? $attributes['pdfData']['lessor_address'] : 'none',
			'lessor_phone' => isset($attributes['pdfData']['lessor_phone']) ? $attributes['pdfData']['lessor_phone'] : 'none',
			'lessor_end_date' => isset($attributes['pdfData']['lessor_end_date']) ? $attributes['pdfData']['lessor_end_date'] : 'none',
			'owner_lease_premises' => isset($attributes['pdfData']['owner_lease_premises']) ? $attributes['pdfData']['owner_lease_premises'] : 'No',
			'liquor_license_another_premise ' => isset($attributes['pdfData']['liquor_license_another_premise']) ? $attributes['pdfData']['liquor_license_another_premise'] : 'none',
			'other_establishment_name' => isset($attributes['pdfData']['other_establishment_name']) ? $attributes['pdfData']['other_establishment_name'] : 'none',
			'other_establishment_address' => isset($attributes['pdfData']['other_establishment_address']) ? $attributes['pdfData']['other_establishment_address'] : 'none',
			'action_pending_against_owner' => isset($attributes['pdfData']['action_pending_against_owner']) ? $attributes['pdfData']['action_pending_against_owner'] : 'none',
			'owner_been_issued_wagering_stamp' => isset($attributes['pdfData']['owner_been_issued_wagering_stamp']) ? $attributes['pdfData']['owner_been_issued_wagering_stamp'] : 'none',
			'previous_liquor_license_been_revoked' => isset($attributes['pdfData']['previous_liquor_license_been_revoked']) ? $attributes['pdfData']['previous_liquor_license_been_revoked'] : 'none',
			'status' => $attributes['pdfData']['status']
		];

		// return $data;

		$pdf = PDF::loadView('liquor-application-pdf', ['pdf' => $data['pdf']]);
		
		// return $pdf->download('liquor.pdf');

		try{
			Mail::send('liquor-application-pdf', $data, function($message) use ($data,$pdf){
				// $pdf = PDF::loadView('pdf', $data);
				$message->from('mail@astutewebgroup.com', 'Liquor Application');
				$message->to('valencia.mel.06@gmail.com');
				$message->cc('melchor@astutewebgroup.com');
				$message->subject('Liquor');
				//Attach PDF doc
				$message->attachData($pdf->output(),'Liquors.pdf');
			});
		}catch(JWTException $exception){
			$this->serverstatuscode = "0";
			$this->serverstatusdes = $exception->getMessage();
		}

	}
}