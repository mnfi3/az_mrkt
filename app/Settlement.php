<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settlement extends Model
{
  use SoftDeletes;

  protected $fillable = ['producer_id', 'amount', 'bank', 'bank_account', 'bank_account_owner', 'bank_shba', 'document'];


  public function producer(){
    return $this->belongsTo('App\User', 'producer_id');
  }
}
