<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporation extends Model
{
    protected $table = 'corporations';

    protected $fillable = [
        'corporate_name', 'corporate_address',
        'store_manager_name', 'store_manager_email', 'store_manager_phone',
        'store_manager_address', 'president_name', 'president_email',
        'president_phone', 'president_address', 'vice_president_name',
        'vice_president_email', 'vice_president_phone', 'vice_president_address',
        'secretary_name', 'secretary_email', 'secretary_phone',
        'secretary_address', 'treasurer_name', 'treasurer_email',
        'treasurer_phone', 'treasurer_address', 'had_business_other_corporation',
        'other_corporate_name', 'other_corporate_address', 'date_qualified_transact_business'
    ];
    
    public function liquorApplication() 
    {
        return $this->morphOne(LiquorApplication::class, 'businessClassifiable');
    }

    public function shareHolders()
    {
        return $this->hasMany(CorporationShareholder::class);
    }
}
