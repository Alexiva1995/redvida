<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class MetodoPago extends Model
{
    protected $table = "settingpagos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'nombre', 'logo', 'feed', 'monto_min', 'tipofeed', 'estado', 'wallet', 'correo', 'datosbancarios'
    ];
    
}