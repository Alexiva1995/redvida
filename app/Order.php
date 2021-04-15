<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Order extends Model{

    protected $table = "orders";

    protected $fillable = [
        'user_id','product_id', 'amount', 'payment_method', 'payment_ref', 'date', 'status'
    ];

  
    public function getUser(){
        return $this->belongsTo('App\User','user_id', 'ID');
    }

    public function getProduct(){
        return $this->belongsTo('App\Product','product_id', 'id');
    }
}
