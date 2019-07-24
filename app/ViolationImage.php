<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViolationImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'images', 'inspector_id', 'violation_id'
    ];

    public function violation()
    {
        return $this->belongsTo(Violation::class);
    }    
}
