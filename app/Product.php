<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
// use Spatie\MediaLibrary\HasMedia\HasMedia;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

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
         'status',

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