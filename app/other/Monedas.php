<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Monedas extends Model
{
    protected $table = "monedas";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'nombre', 'simbolo', 'mostrar_a_d', 'principal'
    ];
    
}