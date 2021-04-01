<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $primaryKey = 'customerNumber';
    public $table = 'CUSTOMERS';

    public $guarded =[];
     public function orders(){
         return $this->hasMany(Order::class,'customerNumber','customerNumber');
     }
}
