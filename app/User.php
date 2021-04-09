<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hexters\CoinPayment\Entities\CoinPaymentuserRelation;

class User extends Authenticatable{
   use Notifiable, HasRoles;

   protected $table = "wp_users";
   protected $primaryKey = 'ID';

   protected $fillable = [
      'name', 'phone', 'country', 'birthdate', 'gender', 'address', 'user_login', 'user_pass', 
      'user_nicename', 'user_email', 'user_url', 'user_registered', 'user_activation_key', 'user_status',
      'display_name', 'password', 'avatar', 'referred_id', 'sponsor_id', 'position_id', 'status', 
      'rol_id', 'wallet', 'wallet_amount', 'rentabilidad', 'porc_rentabilidad', 'clave', 'activacion', 
      'token_correo', 'verificar_correo', 'toke_google', 'tipouser', 'check_token_google', 'puntos', 
      'paquete', 'puntosP', 'puntosizq', 'puntosder', 'ladomatrix', 'ladoregistrar', 'icono_paquete', 
      'clave_maestra', 'fecha_activacion',  
   ];

   protected $hidden = [
      'password', 'remember_token',
   ];

   /*RELACIONES ACTUALES */
   public function referred(){
      return $this->belongsTo(User::class, 'referred_id');
   }

   public function commissions(){
      return $this->hasMany('App\Commission', 'user_id', 'ID');
   }

   public function commissions_referred(){
      return $this->hasMany('App\Commission', 'referred_id', 'ID');
   }

   public function liquidations(){
      return $this->hasMany('App\Liquidation', 'user_id', 'ID');
   }

   public function orders(){
      return $this->hasMany('App\Order');
   }

   public function wallet_transactions(){
      return $this->hasMany('App\WalletTransaction');
   }
   /*FIN DE RELACIONES ACTUALES */





    public function scopeSearch($query, $user_email){
         $query->where(DB::raw("CONCAT(ID)"),"LIKE" ,"%$user_email%");
    }

    public function rol(){
        return $this->belongsTo('App\Rol');
    }

    public function transfers(){
        return $this->hasMany('App\Transfer');
    }
    
    public function tickets(){
        return $this->hasMany('App\Ticket');
        
    }

    public function comentarios(){
        return $this->hasMany('App\Comentario');
        
    }


}
