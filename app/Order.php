<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $guarded =[];
    public $primaryKey = 'orderNumber';
    public $table = 'orders';

    public function employee(){
        return $this->belongsTo(Employee::class,'employeeNumber','employeeNumber');
    }
    public function customers(){
        return $this->belongsTo(Customer::class,'customerNumber','customerNumber');
    }
}
