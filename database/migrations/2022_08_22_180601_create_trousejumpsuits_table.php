<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrousejumpsuitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trousejumpsuits', function (Blueprint $table) {
            $table->increments('id');
            $$table->string('client_id')->nullable();
            $table->string('date')->nullable();
            $table->string('measuretype')->nullable();
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();
            $table->string('waisttohip')->nullable();
            $table->string('waisttoknee')->nullable();
            $table->string('waisttocalf')->nullable();
            $table->string('waisttofloor')->nullable();
            $table->string('around knee')->nullable();
            $table->string('thigh')->nullable();
            $table->string('calf')->nullable();
            $table->string('ankle')->nullable();
            $table->string('seat')->nullable();
            $table->string('trouserlength')->nullable();
            $table->string('style')->nullable();
            $table->string('typeofmaterial')->nullable();
            $table->text('note')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('trousejumpsuits');
    }
}
