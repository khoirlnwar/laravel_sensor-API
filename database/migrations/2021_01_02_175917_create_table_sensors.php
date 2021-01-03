<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSensors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('adc_1');
            $table->integer('adc_2');
            $table->float('adc1_weight1');
            $table->float('adc1_weight2');
            $table->float('adc1_weight3');
            $table->float('adc2_weight1');
            $table->float('adc2_weight2');
            $table->float('adc2_weight3');
            $table->integer('pwm');
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
        Schema::dropIfExists('sensors');
    }
}
