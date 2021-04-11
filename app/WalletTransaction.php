<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model {
    protected $table = "wallet_transactions";

    protected $fillable = [
        'user_id',
        'wallet_used',
        'operation_type',
        'description',
        'amount',
        'liquidation_id',
    ];
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'ID');
    }

    public function liquidation(){
        return $this->belongsTo('App\Liquidation');
    }
}