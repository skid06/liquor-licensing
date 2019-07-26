<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'message', 'admin_id', 'application_id'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function application(){
        return $this->belongsTo(Application::class);
    } 
    
    public function liquorApplication(){
        return $this->belongsTo(LiquorApplication::class);
    }     
}
