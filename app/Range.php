<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class Range extends Model 
// implements HasMedia
{
    protected $table = "ranges";
    /** 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name',
         'act_direct',
         'diamond_directors',
         'level',
         'group_vol',
         'status',
    ];
    
    public function getUser(){
        return $this->belongsTo('App\User','iduser', 'id');
    }
}