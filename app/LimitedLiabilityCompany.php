<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimitedLiabilityCompany extends Model
{
    //
    protected $fillable = [
        'liquor_application_id', 'llc_manager_name', 'llc_manager_email',
        'llc_manager_phone', 'store_manager_name', 'store_manager_email',
        'store_manager_phone', 'store_manager_address', 'state_of_organization'
    ];

    public function liquorApplication() 
    {
        return $this->morphOne(LiquorApplication::class, 'classifiable');
    }

    public function children()
    {
        return $this->hasMany(LimitedLiabilityCompanyMember::class, 'llc_id');
    }
}
