<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassFee extends Model
{
    public function liquorApplication(){
        return $this->belongsTo(LiquorApplication::class, 'class_fee_id');
    }  
}
