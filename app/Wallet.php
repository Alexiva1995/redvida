<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class Wallet extends Model 
// implements HasMedia
{
    protected $table = "wallets";
    /** 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'iduser',
         'email',
         'description',
         'amount',
         'status',
    ];
    
    public function getUser(){
        return $this->belongsTo('App\User','iduser', 'id');
    }
}