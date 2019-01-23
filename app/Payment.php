<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'amount', 'balance_transaction', 'description',
        'brand', 'exp_month', 'exp_year', 'name_on_card'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
