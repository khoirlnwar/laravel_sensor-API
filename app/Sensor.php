<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    //
    protected $fillable = array(
        'adc_1', 
        'adc_2',
        'adc1_weight1',
        'adc1_weight2',
        'adc1_weight3',
        'adc2_weight1',
        'adc2_weight2',
        'adc2_weight3',
        'pwm'
    );
}
