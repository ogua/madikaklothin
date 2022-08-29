<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDressblouseskirtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dressblouseskirts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id')->nullable();
            $table->string('date')->nullable();
            $table->string('measuretype')->nullable();
            $table->string('measurefor')->nullable();
            $table->string('busty1')->nullable();
            $table->string('busty2')->nullable();
            $table->string('waist')->nullable();
            $table->string('underbust')->nullable();
            $table->string('shouldertowaist')->nullable();
            $table->string('shouldertounderwaist')->nullable();
            $table->string('shouldertonipple1')->nullable();
            $table->string('shouldertonipple2')->nullable();
            $table->string('shouldertoKnee')->nullable();
            $table->string('shouldertohip')->nullable();
            $table->string('waisttohip')->nullable();
            $table->string('duration')->nullable();
            $table->string('waisttoknee')->nullable();
            $table->string('waisttofloor')->nullable();
            $table->string('kneetofloor')->nullable();
            $table->string('nipppletonipple')->nullable();
            $table->string('aroundarm')->nullable();
            $table->string('sleeevelength')->nullable();
            $table->string('shortdress')->nullable();
            $table->string('longdress')->nullable();
            $table->string('mididress')->nullable();
            $table->string('blouselength')->nullable();
            $table->string('skirtlength')->nullable();
            $table->string('slitlength')->nullable();
            $table->string('hip')->nullable();
            $table->string('fulllength')->nullable();
            $table->string('acrosschest')->nullable();
            $table->string('acrossback')->nullable();
            $table->string('neck')->nullable();
            $table->string('offshoulder')->nullable();
            $table->string('aroundknee')->nullable();
            $table->string('waisttocalf')->nullable();
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
        Schema::dropIfExists('dressblouseskirts');
    }
}
