<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class Billetera extends Model 
// implements HasMedia
{
    protected $table = "billeteras";
    /** 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'iduser',
         'email',
         'descripcion',
         'monto',
         'estado',
    ];
    
    public function getUser(){
        return $this->belongsTo('App\User','iduser', 'id');
    }
}