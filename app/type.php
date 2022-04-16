<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class type extends Model
{

  

protected $fillable = [
  'name',
  'price',
  'stockMin',
  'Current_stock',
];


    public function Generation()
    {
      return $this->hasMany('App\Generation');
    }
}
