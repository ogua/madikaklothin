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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('fullname')->nullable();
            $table->string('gender')->nullable();
            $table->string('addrress')->nullable();
            $table->string('tel')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->string('age')->nullable();
            $table->string('levelofeducation')->nullable();
            $table->string('contactpersons')->nullable();
            $table->string('contactrelations')->nullable();
            $table->string('contactnumber')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
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
