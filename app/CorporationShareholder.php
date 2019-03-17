<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorporationShareholder extends Model
{
    protected $table = 'corporation_shareholders';

    protected $fillable = [
        'corporation_id', 'name', 'percentage_owned', 'address'
    ];

    public function corporation()
    {
        return $this->belongsTo(Corporation::class);
    }
}
