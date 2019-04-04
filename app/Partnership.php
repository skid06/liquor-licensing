<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    protected $fillable = ['type'];
    
    public function liquorApplication() 
    {
        return $this->morphOne(LiquorApplication::class, 'businessClassifiable');
    }

    public function owners()
    {
        return $this->hasMany(PartnershipOwners::class);
    }
}
