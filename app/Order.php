<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{

    protected $table = "orders";

    protected $fillable = [
        'user_id', 'amount', 'payment_method', 'payment_ref', 'date', 'status'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'ID');
    }
}
