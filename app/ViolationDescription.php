<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViolationDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descriptions', 'pin_code', 'inspector_id', 'violation_id'
    ];

    public function violation()
    {
        return $this->belongsTo(Violation::class);
    }    
}
