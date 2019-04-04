<?php

namespace App\Http\Repositories;

use App\User;
use Carbon\Carbon;
use App\LiquorApplication;
use App\Http\Repositories\Interfaces\BusinessClassificationInterface;

class CorporationRepository implements BusinessClassificationInterface
{
	private $corporation;
	
	public function __construct(Corporation $corporation)
	{
		$this->corporation = $corporation;
	}
	
	public function store($attributes)
	{
		if(!$attribues['id']){
			$this->corporation = new Corporation;
		}
		else {
			$this->corporation = Corporation::findOrFail($corporation->id);
		}

		$this->corporation->president_name = $attributes['president_name'];
		$this->corporation->president_address = $attributes['president_address'];
		$this->corporation->president_phone = $attributes['president_phone'];
		$this->corporation->president_email = $attributes['president_email'];
		$this->corporation->vice_president_name = $attributes['vice_president_name'];
		$this->corporation->vice_president_address = $attributes['vice_president_address'];
		$this->corporation->vice_president_phone = $attributes['vice_president_phone'];
		$this->corporation->vice_president_email = $attributes['vice_president_email'];
		$this->corporation->secretary_name = $attributes['secretary_name'];
		$this->corporation->secretary_address = $attributes['secretary_address'];
		$this->corporation->secretary_phone = $attributes['secretary_phone'];
		$this->corporation->secretary_email = $attributes['secretary_email'];
		$this->corporation->treasurer_name = $attributes['treasurer_name'];
		$this->corporation->treasurer_address = $attributes['treasurer_address'];
		$this->corporation->treasurer_phone = $attributes['treasurer_phone'];
		$this->corporation->treasurer_email = $attributes['treasurer_email']; 
		$this->corporation->save();                 
	}

	public function show()
	{

	}
}

?>