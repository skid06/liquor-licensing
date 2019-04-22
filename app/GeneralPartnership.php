<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralPartnership extends Model
{
    //
    protected $filled = [
        'liquor_application_id', 'name', 'email', 'address', 'percentage'
    ];

    public function liquorApplication() 
    {
        return $this->morphOne(LiquorApplication::class, 'classifiable');
    }    

    public function owners()
    {
        return $this->morphMany(BusinessClassificationOwner::class, 'ownerable');
    }
}
