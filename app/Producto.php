<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
// use Spatie\MediaLibrary\HasMedia\HasMedia;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Producto extends Model 
// implements HasMedia
{
    protected $table = "productos";
    /** 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'producto',
         'descripcion',
         'cantidad',
         'valor_preferente',
         'valor_publico',
         'valor_comisionable_pts',
         'pts_compra_mensual',
         'pts_compra_rangos',
         'pts_compra_premios',
         'valor_pts_compra',
         'estado',

    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getPhotoUrlAttribute()
    {
        if($this->getMedia('photo')->isEmpty())
        {
            return $this->role == "completion specialist" ?  "/img/completion_photo.png" : "/img/user_photo.jpg";
        } else {
            return $this->getMedia('photo')->first()->file;
        }
    }
}