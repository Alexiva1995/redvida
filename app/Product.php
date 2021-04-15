<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model 
// implements HasMedia
{
    protected $table = "products";
    /** 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id',
         'product',
         'description',
         'amount',
         'preferred_value',
         'public_value',
         'commissionable_pts_value',
         'pts_buy_monthly',
         'pts_purchase_ranges',
         'pts_purchase_prizes',
         'purchase_pts_value',
         'discount',
         'status',

    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}