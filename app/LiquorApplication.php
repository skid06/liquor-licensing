<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiquorApplication extends Model
{
    protected $table = 'liquor_applications';

    protected $fillable = [
        'business_name', 'business_address', 'business_city',
        'business_state', 'business_zip', 'business_phone',
        'business_email', 'business_contact_person', 'business_classification', 
        'business_contact_title', 'business_contact_phone',  'born_outside_us',
        'born_us_parents', 'date_of_birth', 'naturalized',
        'naturalized_city', 'naturalized_state', 'naturalized_date',
        'owner_lease_premises', 'establishment_owner_name', 'establishment_owner_address',
        'establishment_owner_city', 'establishment_owner_state', 'establishment_owner_zip',
        'establishment_owner_phone', 'lessor_name', 'lessor_address',
        'lessor_city', 'lessor_state', 'lessor_zip',
        'lessor_phone', 'lessor_end_date', 'current_lease',
        'liquor_license_another_premise', 'other_establishment_name', 'other_establishment_address',
        'other_establishment_city', 'other_establishment_state', 'other_establishment_zip',
        'action_pending_against_owner', 'owner_been_issued_wagering_stamp', 'previous_liquor_license_been_revoked',
        'user_id', 'businessClassifiable_id', 'businessClassifiable_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    } 

    public function classFee()
    {
        return $this->hasOne(ClassFee::class);
    }     

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function classifiable()
    {
        return $this->morphTo();
    }

    // public function corporation() {
    //     return $this->hasOne(Corporation::class);
    // }

    // public function llc()
    // {
    //     return $this->hasOne(LimitedLiabilityCompany::class);
    // }


}
