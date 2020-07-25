<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderContent extends Model
{
    use SoftDeletes;

    protected $fillable = ['order_id', 'book_id', 'count', 'price'];

    public function book(){
      return $this->belongsTo('App\Book')->withTrashed();
    }
}
