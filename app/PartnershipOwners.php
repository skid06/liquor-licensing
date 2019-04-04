<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnershipOwners extends Model
{
    protected $table = 'partnership_owners';

    protected $filled = [
        'name', 'email', 'address', 'percentage_owned'
    ];

    public function partnership(){
        return $this->belongsTo(Partnership::class);
    }
}
