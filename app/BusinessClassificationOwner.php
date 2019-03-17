<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessClassificationOwner extends Model
{
    //

    protected $filled = [
        'name', 'email', 'address', 'percentage_owned'
    ];    

    public function ownerable()
    {
        return $this->morphTo();
    }
}
