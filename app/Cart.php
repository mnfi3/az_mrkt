<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;


    protected $fillable = ['user_id'];


    public function contents(){
      return $this->hasMany('App\CartContent');
    }


    public function user(){
      return $this->belongsTo('App\User');
    }


}
