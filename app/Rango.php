<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class Rango extends Model 
// implements HasMedia
{
    protected $table = "rangos";
    /** 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'nombre',
         'act_directos',
         'directores_diamante',
         'nivel',
         'vol_grupal',
         'estado',
    ];
    
    public function getUser(){
        return $this->belongsTo('App\User','iduser', 'id');
    }
}