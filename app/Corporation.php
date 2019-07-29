<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporation extends Model
{
    protected $table = 'corporations';

    protected $fillable = [
        'corporate_name', 'corporate_address',
        'corporate_city', 'corporate_state', 'corporate_zip',
        'store_manager_name', 'store_manager_email', 'store_manager_phone',
        'store_manager_address', 'store_manager_city', 'store_manager_state',
        'store_manager_zip', 'president_name', 'president_email',
        'president_phone', 'president_address', 'president_city',
        'president_state', 'president_zip', 'vice_president_name',
        'vice_president_email', 'vice_president_phone', 'vice_president_address',
        'vice_president_city', 'vice_president_state', 'vice_president_zip',
        'secretary_name', 'secretary_email', 'secretary_phone',
        'secretary_address', 'secretary_city', 'secretary_state',
        'secretary_zip', 'treasurer_name', 'treasurer_email',
        'treasurer_phone', 'treasurer_address', 'treasurer_city',
        'treasurer_state', 'treasurer_zip', 'had_business_other_corporation',
        'other_corporate_name', 'other_corporate_address', 'date_qualified_transact_business'
    ];
    
    public function liquorApplication() 
    {
        return $this->morphOne('App\LiquorApplication', 'classifiable');
    }

    public function children()
    {
        return $this->hasMany(CorporationShareholder::class);
    }
}
