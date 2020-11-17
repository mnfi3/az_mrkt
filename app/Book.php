<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    const KEY_STATUS_ACCEPTED = 'accepted';
    const KEY_STATUS_REJECTED = 'rejected';
    const KEY_STATUS_PENDING = 'pending';


    protected $fillable = [
      'producer_id', 'category_id', 'name', 'description', 'price', 'discount_percent', 'stock', 'image_path', 'is_important', 'demo_file', 'status'
    ];


    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function orderContents(){
      return $this->hasMany('App\OrderContent');
    }

    public function producer(){
      return $this->belongsTo('App\User', 'producer_id');
    }
}
