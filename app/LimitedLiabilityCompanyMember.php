<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimitedLiabilityCompanyMember extends Model
{
    //
    protected $fillable = [
        'llc_id', 'name', 'email', 'phone', 'address',
        'city', 'state', 'zip'
    ];

    public function llc()
    {
        return $this->belongsTo(LimitedLiabilityCompany::class);
    }
}
