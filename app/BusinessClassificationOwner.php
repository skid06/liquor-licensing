<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessClassificationOwner extends Model
{
    protected $table = 'business_classification_owners';

    protected $filled = [
        'name', 'email', 'address', 'percentage_owned',
        'ownerable_id', 'ownerable_type'
    ];    

    public function ownerable()
    {
        return $this->morphTo();
    }
}
