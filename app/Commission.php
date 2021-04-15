<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Commission extends Model{
    protected $table = "commissions";

    protected $fillable = [
         'user_id', 'order_id', 'amount', 'referred_id', 'referred_level', 'type', 'date', 'liquidation_id', 'status'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function order(){
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function referred(){
        return $this->belongsTo('App\User', 'referred_id');
    }

    public function liquidation(){
        return $this->belongsTo('App\User', 'liquidation_id');
    }
}