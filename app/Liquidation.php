<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquidation extends Model{

    protected $table = "liquidations";

    protected $fillable = [
        'user_id', 'amount', 'wallet', 'comment', 'payment_ref', 'date', 'process_date', 'reverse_comment', 'status'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function commissions(){
      return $this->hasMany('App\Commission', 'liquidation_id', 'id');
    }

    public function wallet_transaction(){
        return $this->hasOne('App\WalletTransaction');
    }
}
