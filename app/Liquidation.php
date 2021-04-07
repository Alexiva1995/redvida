<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquidation extends Model{

    protected $table = "liquidations";

    protected $fillable = [
        'user_id', 'amount', 'wallet', 'comment', 'payment_ref', 'date', 'status'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
