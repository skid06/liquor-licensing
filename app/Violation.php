<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'complainant_name', 'complainant_email', 'complainant_phone',
        'violator_name', 'violator_address', 'violator_city',
        'violator_state', 'violator_zip', 'pin_code', 'ward_district_no',
        'status'
    ];

    public function notes(){
        return $this->hasMany(ViolationNote::class);
    }

    public function descriptions(){
        return $this->hasMany(ViolationDescription::class);
    }    

    public function images(){
        return $this->hasMany(ViolationImage::class);
    }    
}
