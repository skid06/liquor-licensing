<?php

namespace App\Http\Repositories;

use PDF;
use Mail;
use App\User;
use App\Admin;
use Carbon\Carbon;
use App\Corporation;
use App\Partnership;
use App\LiquorApplication;
use App\LimitedLiabilityCompany;
use App\PartnershipOwners as Owner;
use App\CorporationShareholder as Shareholder;
use App\LimitedLiabilityCompanyMember as Member;
use App\Events\UserApplicationProcessed;
use App\Http\Traits\FieldName;
use App\Http\Repositories\Interfaces\ApplicationInterface;
use App\Http\Repositories\Interfaces\BusinessClassificationInterface;

class LiquorApplicationRepository implements ApplicationInterface
{
	use FieldName;

	public function store($attributes)
	{
		// return $attributes['members'];
		if(!$attributes['app_id']){
			$application = new LiquorApplication;
		}
		else{
			$application = LiquorApplication::find($attributes['app_id']);
		}

		$application->user_id = \Auth::user()->id;
		$application->business_name = $this->setValue($attributes['business_name']);
		$application->business_address = $this->setValue($attributes['business_address']);
		$application->business_phone = $this->setValue($attributes['business_phone']);
		$application->business_email = $this->setValue($attributes['business_email']);
		$application->business_classification = $this->setValue($attributes['business_classification']);
		$application->business_contact_person = $this->setValue($attributes['business_contact_person']);
		$application->business_contact_title = $this->setValue($attributes['business_contact_title']);
		$application->business_contact_phone = $this->setValue($attributes['business_contact_phone']);
		$application->born_outside_us = $this->setValue($attributes['born_outside_us']);
		$application->born_us_parents = $this->setValue($attributes['born_us_parents']);
		$application->date_of_birth = $this->setValue($attributes['date_of_birth']);
		$application->naturalized = $this->setValue($attributes['naturalized']);
		$application->birth_country = $this->setValue($attributes['birth_country']);
		$application->naturalized_city = $this->setValue($attributes['naturalized_city']);
		$application->naturalized_state = $this->setValue($attributes['naturalized_state']);
		$application->naturalized_date = $this->setValue($attributes['naturalized_date']);
		$application->owner_lease_premises = $this->setValue($attributes['owner_lease_premises']);
		$application->establishment_owner_name = $this->setValue($attributes['establishment_owner_name']);
		$application->establishment_owner_address = $this->setValue($attributes['establishment_owner_address']);
		$application->establishment_owner_phone = $this->setValue($attributes['establishment_owner_phone']);
		$application->lessor_name = $this->setValue($attributes['lessor_name']);
		$application->lessor_address = $this->setValue($attributes['lessor_address']);
		$application->lessor_phone = $this->setValue($attributes['lessor_phone']);
		$application->lessor_end_date = $this->setValue($attributes['lessor_end_date']);  
		$application->liquor_license_another_premise = $this->setValue($attributes['liquor_license_another_premise']);
		$application->other_establishment_name = $this->setValue($attributes['other_establishment_name']);
		$application->other_establishment_address = $this->setValue($attributes['other_establishment_address']);
		$application->action_pending_against_owner = $this->setValue($attributes['action_pending_against_owner']);
		$application->owner_been_issued_wagering_stamp = $this->setValue($attributes['owner_been_issued_wagering_stamp']);
		$application->previous_liquor_license_been_revoked = $this->setValue($attributes['previous_liquor_license_been_revoked']);
		$application->class_fee_id = $this->setValue($attributes['class_fee']);
		$application->status = $this->setValue($attributes['status']);
    
    if($attributes['business_classification'] == 'Corporation') {
      if(!$attributes['app_id']){
        $corporation = new Corporation;
      }
      else {
        $corporation = Corporation::findOrFail($application->classifiable_id);
			}
			$corporation->corporate_name = $this->setValue($attributes['corporate_name']);
      $corporation->corporate_address = $this->setValue($attributes['corporate_address']);
      $corporation->store_manager_name = $this->setValue($attributes['store_manager_name']);
      $corporation->store_manager_address = $this->setValue($attributes['store_manager_address']);
      $corporation->store_manager_phone = $this->setValue($attributes['store_manager_phone']);
			$corporation->store_manager_email = $this->setValue($attributes['store_manager_email']);
      $corporation->president_name = $this->setValue($attributes['president_name']);
      $corporation->president_address = $this->setValue($attributes['president_address']);
      $corporation->president_phone = $this->setValue($attributes['president_phone']);
      $corporation->president_email = $this->setValue($attributes['president_email']);			
      $corporation->vice_president_name = $this->setValue($attributes['vice_president_name']);
      $corporation->vice_president_address = $this->setValue($attributes['vice_president_address']);
      $corporation->vice_president_phone = $this->setValue($attributes['vice_president_phone']);
      $corporation->vice_president_email = $this->setValue($attributes['vice_president_email']);
      $corporation->secretary_name = $this->setValue($attributes['secretary_name']);
      $corporation->secretary_address = $this->setValue($attributes['secretary_address']);
      $corporation->secretary_phone = $this->setValue($attributes['secretary_phone']);
      $corporation->secretary_email = $this->setValue($attributes['secretary_email']);
      $corporation->treasurer_name = $this->setValue($attributes['treasurer_name']);
      $corporation->treasurer_address = $this->setValue($attributes['treasurer_address']);
      $corporation->treasurer_phone = $this->setValue($attributes['treasurer_phone']);
			$corporation->treasurer_email = $this->setValue($attributes['treasurer_email']);

			$corporation->had_business_other_corporation = $this->setValue($attributes['had_business_other_corporation']);
			$corporation->date_qualified_transact_business = $this->setValue($attributes['date_qualified_transact_business']);
			$corporation->other_corporate_name = $this->setValue($attributes['other_corporate_name']);
			$corporation->other_corporate_address = $this->setValue($attributes['other_corporate_address']);   
			
			$corporation->save();     

			$application->classifiable_id = $corporation->id;
			$application->classifiable_type = 'App\Corporation';
			// return $attributes['shareholders'];

			// if(json_decode($attributes['shareholders'])[0]->name != ''){
			if(count(json_decode($attributes['shareholders'])) > 0){
				foreach(json_decode($attributes['shareholders']) as $shareholder){
					if(isset($shareholder->id)){
						$dbShareholder = Shareholder::find($shareholder->id);
						$dbShareholder->name = $this->setValue($shareholder->name);
						$dbShareholder->address = $this->setValue($shareholder->address);
						$dbShareholder->percentage_owned = $this->setValue($shareholder->percentage_owned);
						$dbShareholder->corporation_id = $corporation->id;
						$dbShareholder->save();						
					}
					else {
						if($shareholder->name != ""){
							$dbShareholder = new Shareholder;
							$dbShareholder->name = $this->setValue($shareholder->name);
							$dbShareholder->address = $this->setValue($shareholder->address);
							$dbShareholder->percentage_owned = $this->setValue($shareholder->percentage_owned);
							$dbShareholder->corporation_id = $corporation->id;
							$dbShareholder->save();
						}
					}					
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
			
			$llc->state_of_organization = $this->setValue($attributes['state_of_organization']);
			$llc->llc_manager_name = $this->setValue($attributes['llc_manager_name']);
			$llc->llc_manager_email = $this->setValue($attributes['llc_manager_email']);
			$llc->llc_manager_phone = $this->setValue($attributes['llc_manager_phone']);
			$llc->store_manager_name = $this->setValue($attributes['store_manager_name']);
			$llc->store_manager_email = $this->setValue($attributes['store_manager_email']);
			$llc->store_manager_phone = $this->setValue($attributes['store_manager_phone']);
			$llc->store_manager_address = $this->setValue($attributes['store_manager_address']);

			$llc->save();

			$application->classifiable_id = $llc->id;
			$application->classifiable_type = 'App\LimitedLiabilityCompany';

			// return $attributes['members'];
			// dd(json_decode($attributes['members']));

			// if(json_decode($attributes['members'])[0]->name != ''){
			if(count(json_decode($attributes['members'])) > 0){
				foreach(json_decode($attributes['members']) as $member){
					if(isset($member->id)){
						$dbMember = Member::find($member->id);
						$dbMember->name = $this->setValue($member->name);
						$dbMember->address = $this->setValue($member->address);
						$dbMember->email = $this->setValue($member->email);
						$dbMember->phone = $this->setValue($member->phone);
						$dbMember->llc_id = $llc->id;
						$dbMember->save();						
					}
					else {
						if($member->name != ""){
							$dbMember = new Member;
							$dbMember->name = $this->setValue($member->name);
							$dbMember->address = $this->setValue($member->address);
							$dbMember->email = $this->setValue($member->email);
							$dbMember->phone = $this->setValue($member->phone);
							$dbMember->llc_id = $llc->id;
							$dbMember->save();	
						}					
					}
				}
				// dd($attributes->input('members'));
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
			// return $attributes['owners'];
			
			if(count(json_decode($attributes['owners'])) > 0){
			// if(json_decode($attributes['owners'])[0]->name != ''){
				foreach(json_decode($attributes['owners']) as $owner){
					if(isset($owner->id)){
						$dbOwner = Owner::find($owner->id);
						$dbOwner->name = $this->setValue($owner->name);
						$dbOwner->email = $this->setValue($owner->email);
						$dbOwner->address = $this->setValue($owner->address);
						$dbOwner->percentage_owned = $this->setValue($owner->percentage_owned);
						$dbOwner->partnership_id = $partnership->id;
						$dbOwner->save();						
					}
					else {
						if($owner->name != ""){
							$dbOwner = new Owner;
							$dbOwner->name = $this->setValue($owner->name);
							$dbOwner->email = $this->setValue($owner->email);
							$dbOwner->address = $this->setValue($owner->address);
							$dbOwner->percentage_owned = $this->setValue($owner->percentage_owned);
							$dbOwner->partnership_id = $partnership->id;
							$dbOwner->save();	
						}					
					}
				}		
			}	
		}

		if(isset($attributes['current_lease'])){
			$filename = request()->file('current_lease')->getClientOriginalName();			
			$path = request()->file('current_lease')->storeAs('current_leases',time()."-".$filename,'public');
			$application->current_lease = time()."-".$filename;
			// $application->current_lease = $path;
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

			'corporate_name' => $this->setValue($attributes['pdfData']['corporate_name']),
			'corporate_address' => $this->setValue($attributes['pdfData']['corporate_address']),
			'store_manager_name' => $this->setValue($attributes['pdfData']['store_manager_name']),
			'store_manager_email' => $this->setValue($attributes['pdfData']['store_manager_email']),
			'store_manager_address' => $this->setValue($attributes['pdfData']['store_manager_address']),
			'store_manager_phone' => $this->setValue($attributes['pdfData']['store_manager_phone']),              
			'president_name' => $this->setValue($attributes['pdfData']['president_name']),
			'president_email' => $this->setValue($attributes['pdfData']['president_email']),
			'president_address' => $this->setValue($attributes['pdfData']['president_address']),
			'president_phone' => $this->setValue($attributes['pdfData']['president_phone']),
			'vice_president_name' => $this->setValue($attributes['pdfData']['vice_president_name']),
			'vice_president_email' => $this->setValue($attributes['pdfData']['vice_president_email']),
			'vice_president_address' => $this->setValue($attributes['pdfData']['vice_president_address']),
			'vice_president_phone' => $this->setValue($attributes['pdfData']['vice_president_phone']),
			'secretary_name' => $this->setValue($attributes['pdfData']['secretary_name']),
			'secretary_email' => $this->setValue($attributes['pdfData']['secretary_email']),
			'secretary_address' => $this->setValue($attributes['pdfData']['secretary_address']),
			'secretary_phone' => $this->setValue($attributes['pdfData']['secretary_phone']),
			'treasurer_name' => $this->setValue($attributes['pdfData']['treasurer_name']),
			'treasurer_email' => $this->setValue($attributes['pdfData']['treasurer_address']),
			'treasurer_address' => $this->setValue($attributes['pdfData']['treasurer_address']),
			'treasurer_phone' => $this->setValue($attributes['pdfData']['treasurer_phone']),
			'shareholders' => $this->setValue($attributes['pdfData']['shareholders']),
			// 'shareholders' => $this->setValue($attributes['pdfData']['children']) ? $attributes['pdfData']['children'] : 'none',

			// 'classifiable_type' => $attributes['pdfData']['classifiable_type'],

			'state_of_organization' => $this->setValue($attributes['pdfData']['state_of_organization']),
			'llc_manager_name' => $this->setValue($attributes['pdfData']['llc_manager_name']),
			'llc_manager_email' => $this->setValue($attributes['pdfData']['llc_manager_email']),
			'llc_manager_phone' => $this->setValue($attributes['pdfData']['llc_manager_phone']),
			'store_manager_name' => $this->setValue($attributes['pdfData']['store_manager_name']),
			'store_manager_email' => $this->setValue($attributes['pdfData']['store_manager_email']),
			'store_manager_address' => $this->setValue($attributes['pdfData']['store_manager_address']),
			'store_manager_phone' => $this->setValue($attributes['pdfData']['store_manager_phone']),
			'owners' => $this->setValue($attributes['pdfData']['owners']),            

			// 'state_of_organization' => $attributes['pdfData']['state_of_organization'],
			// 'llc_manager_name' => $attributes['pdfData']['llc_manager_name'],
			// 'llc_manager_email' => $attributes['pdfData']['llc_manager_email'],
			// 'llc_manager_phone' => $attributes['pdfData']['llc_manager_phone'],
			// 'store_manager_name' => $attributes['pdfData']['store_manager_name'],
			// 'store_manager_email' => $attributes['pdfData']['store_manager_email'],
			// 'store_manager_address' => $attributes['pdfData']['store_manager_address'],
			// 'store_manager_phone' => $attributes['pdfData']['store_manager_phone'],              
			'members' => $this->setValue($attributes['pdfData']['members']),

			'other_corporate_name' => $this->setValue($attributes['pdfData']['other_corporate_name']),
			'other_corporate_address' => $this->setValue($attributes['pdfData']['other_corporate_address']),

			'date_qualified_transact_business' => $this->setValue($attributes['pdfData']['date_qualified_transact_business']),
			'had_business_other_corporation' => $this->setValue($attributes['pdfData']['had_business_other_corporation']),
			'establishment_owner_name' => $this->setValue($attributes['pdfData']['establishment_owner_name']),
			'establishment_owner_address' => $this->setValue($attributes['pdfData']['establishment_owner_address']),
			'establishment_owner_phone' => $this->setValue($attributes['pdfData']['establishment_owner_phone']),
			'lessor_name' => $this->setValue($attributes['pdfData']['lessor_name']),
			'lessor_address' => $this->setValue($attributes['pdfData']['lessor_address']),
			'lessor_phone' => $this->setValue($attributes['pdfData']['lessor_phone']),
			'lessor_end_date' => $this->setValue($attributes['pdfData']['lessor_end_date']),
			'owner_lease_premises' => $this->setValue($attributes['pdfData']['owner_lease_premises']),
			'liquor_license_another_premise ' => $this->setValue($attributes['pdfData']['liquor_license_another_premise']),
			'other_establishment_name' => $this->setValue($attributes['pdfData']['other_establishment_name']),
			'other_establishment_address' => $this->setValue($attributes['pdfData']['other_establishment_address']),
			'action_pending_against_owner' => $this->setValue($attributes['pdfData']['action_pending_against_owner']),
			'owner_been_issued_wagering_stamp' => $this->setValue($attributes['pdfData']['owner_been_issued_wagering_stamp']),
			'previous_liquor_license_been_revoked' => $this->setValue($attributes['pdfData']['previous_liquor_license_been_revoked']),
			'status' => $attributes['pdfData']['status']
		];

		// return $data;

		$officials = \App\Official::all();

		$official_emails = array();
		
		foreach($officials as $official){
				array_push($official_emails, $official->email);
		}

		$pdf = PDF::loadView('liquor-application-pdf', ['pdf' => $data['pdf']]);
		
		// return $pdf->download('liquor.pdf');

		try{
			Mail::send('liquor-application-pdf', $data, function($message) use ($data,$pdf, $official_emails){
				// $pdf = PDF::loadView('pdf', $data);
				$message->from('mail@astutewebgroup.com', 'Liquor Application');
				$message->to($official_emails);
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