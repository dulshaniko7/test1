<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

     /*
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
     */

     \Illuminate\Support\Facades\DB::statement('CREATE TABLE EMPLOYEES(
employeeNumber int NOT NULL AUTO_INCREMENT,
lastName varchar(255),
firstName varchar(255),
primary key(employeeNumber)
)');

     \Illuminate\Support\Facades\DB::statement('CREATE TABLE CUSTOMERS(
customerNumber int NOT NULL AUTO_INCREMENT,
customerName varchar(255),
phone varchar(255),
city varchar(255),
primary key(customerNumber)
)');

     \Illuminate\Support\Facades\DB::statement('CREATE TABLE ORDERS(
orderNumber int NOT NULL AUTO_INCREMENT,
orderDate date,
status varchar(100),
comments varchar(255),
updated_at date,
created_at date,
customerNumber int,
employeeNumber int,
primary key(orderNumber),
foreign key(customerNumber) references CUSTOMERS(customerNumber),
foreign key(employeeNumber) references EMPLOYEES(employeeNumber)

)');

     \Illuminate\Support\Facades\DB::statement('ALTER TABLE EMPLOYEES AUTO_INCREMENT = 1001');
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE CUSTOMERS AUTO_INCREMENT = 1001');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
