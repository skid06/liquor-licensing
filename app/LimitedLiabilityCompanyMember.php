<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimitedLiabilityCompanyMember extends Model
{
    //
    protected $fillable = [
        'llc_id', 'name', 'email', 'phone', 'address'
    ];

    public function llc()
    {
        return $this->belongsTo(LimitedLiabilityCompany::class);
    }
}
