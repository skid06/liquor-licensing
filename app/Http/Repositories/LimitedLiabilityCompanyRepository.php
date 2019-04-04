<?php

namespace App\Http\Repositories;

use App\User;
use Carbon\Carbon;
use App\LiquorApplication;
use App\Http\Repositories\Interfaces\BusinessClassificationInterface;

class LimitedLiabilityCompanyRepository implements BusinessClassificationInterface
{
	private $llc;
	
	public function __construct(LimitedLiabilityCompany $llc)
	{
		$this->llc = $llc;
	}
	
	public function store($attributes)
	{
		if(!$attribues['id']){
			$this->llc = new LimitedLiabilityCompany;
		}
		else {
			$this->llc = LimitedLiabilityCompany::findOrFail($llc->id);
		}

		$this->llc->state_of_organization = $attributes['state_of_organization'];
		$this->llc->llc_manager_name = $attributes['llc_manager_name'];
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