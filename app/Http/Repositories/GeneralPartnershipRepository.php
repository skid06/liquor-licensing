<?php

namespace App\Http\Repositories;

use App\User;
use Carbon\Carbon;
use App\LiquorApplication;
use App\Http\Repositories\Interfaces\BusinessClassificationInterface;

class GeneralPartnershipRepository implements BusinessClassificationInterface
{
	private $general_partnership;
	
	public function __construct(GeneralPartnership $general_partnership)
	{
		$this->general_partnership = $general_partnership;
	}
	
	public function store($attributes)
	{
		if(!$attribues['id']){
			$this->general_partnership = new GeneralPartnership;
		}
		else {
			$this->general_partnership = GeneralPartnership::findOrFail($general_partnership->id);
		}

		$this->general_partnership->state_of_organization = $attributes['state_of_organization'];
		$this->general_partnership->general_partnership_manager_name = $attributes['general_partnership_manager_name'];
		$this->llc->llc_manager_email = $attributes['llc_manager_email'];
		$this->llc->llc_manager_phone = $attributes['llc_manager_phone'];
		$this->llc->store_manager_name = $attributes['store_manager_name'];
		$this->llc->store_manager_email = $attributes['store_manager_email'];
		$this->llc->store_manager_phone = $attributes['store_manager_phone'];
		$this->llc->store_manager_address = $attributes['store_manager_address'];
		$this->llc->save();                 
	}

	public function show()
	{

	}
}

?>