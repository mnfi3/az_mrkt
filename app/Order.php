<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'payment_id', 'discount_id', 'is_in_person', 'buy_code', 'address', 'phone', 'postal_code', 'is_sent', 'trace_no', 'letter_number', 'sended_at'];


    public function content(){
      return $this->hasMany('App\OrderContent');
    }

    public function payment(){
      return $this->belongsTo('App\Payment');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }


    public function discount(){
      return $this->belongsTo('App\Discount')->withTrashed();
    }
}
