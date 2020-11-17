<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
  use SoftDeletes;

  const KEY_ADDRESS = 'address';
  const KEY_MANAGER_NAME = 'manager-name';
  const KEY_DIRECT_PHONE = 'direct-phone';
  const KEY_INTERNAL_PHONE = 'internal-phone';
  const KEY_MANAGER_EMAIL = 'manager-email';
  const KEY_LINK1_TITLE = 'link1-title';
  const KEY_LINK1 = 'link1';
  const KEY_LINK2_TITLE = 'link2-title';
  const KEY_LINK2 = 'link2';
  const KEY_LINK3_TITLE = 'link3-title';
  const KEY_LINK3 = 'link3';


  protected $fillable = ['key', 'value'];


  public static function get($key){
    $setting = Setting::where('key', '=', $key)->first();
    if ($setting == null){
      $setting = Setting::create([
        'key' => $key,
        'value' => ''
      ]);
    }

    return $setting;
  }

}
