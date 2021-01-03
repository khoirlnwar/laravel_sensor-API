<?php

use Illuminate\Database\Seeder;
use App\Sensor;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // mengosongkan isi table sensors
        DB::table('sensors')->truncate();

        Sensor::create([
            'adc_1' => 322,
            'adc_2' => 786,
            'adc1_weight1' => 0.24,
            'adc1_weight2' => 0.76,
            'adc1_weight3' => 0.0,
            'adc2_weight1' => 0.0,
            'adc2_weight2' => 0.21,
            'adc2_weight3' => 0.79,
            'pwm' => 200
        ]);

        Sensor::create([
            'adc_1' => 445,
            'adc_2' => 1023,
            'adc1_weight1' => 0.10,
            'adc1_weight2' => 0.90,
            'adc1_weight3' => 0.0,
            'adc2_weight1' => 0.0,
            'adc2_weight2' => 0.0,
            'adc2_weight3' => 1.0,
            'pwm' => 255
        ]);        
    }
}
