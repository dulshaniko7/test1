<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $primaryKey = 'employeeNumber';
    public $table = 'EMPLOYEES';

    public $guarded =[];

    public function orders(){
        return $this->hasMany(Order::class,'employeeNumber','employeeNumber');
    }
}
