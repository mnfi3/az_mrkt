<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role', 'bank', 'bank_account', 'bank_shba', 'bank_account_owner'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function payments(){
      return $this->hasMany('App\Payment');
    }


    public function cart(){
      return $this->hasOne('App\Cart');
    }


    public function orders(){
      return $this->hasMany('App\Order')->orderBy('id', 'desc');
    }

    public function producerBooks(){
      return $this->hasMany('App\Book', 'producer_id');
    }

    public function producerSells(){
      return $this->hasManyThrough('App\OrderContent', 'App\Book', 'producer_id');
    }


    public function producerSettlements(){
      return $this->hasMany('App\Settlement', 'producer_id');
    }


}
