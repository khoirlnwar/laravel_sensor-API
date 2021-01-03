<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;
use Response;

class SensorController extends Controller
{
    // index: menampilkan semua data dari database
    public function index() {
        $sensors = Sensor::all();

        if(is_null($sensors)) 
            return Response::json("table kosong", 500);
                    
        return Response::json($sensors, 201);
    }


    // store: menyimpan data ke database
    public function store(Request $request) {
        

        // validate the request
        if ($request->isMethod('post')) {

            $validated = $request->validate([            
                // adc data
                'adc_1' => 'required|integer',
                'adc_2' => 'required|integer',
    
                // adc weight
                'adc1_weight1' => 'required',
                'adc1_weight2' => 'required',
                'adc1_weight3' => 'required',
    
                'adc2_weight1' => 'required',
                'adc2_weight2' => 'required',
                'adc2_weight3' => 'required',
    
                // pwm value
                'pwm' => 'required|integer'
            ]);
    
            // if there is no errors, controllers will continue executing normally
            // continue insert to table
            $sensor = new Sensor;

            $sensor->adc_1 = $request->adc_1;
            $sensor->adc_2 = $request->adc_2;

            $sensor->adc1_weight1 = $request->adc1_weight1;
            $sensor->adc1_weight2 = $request->adc1_weight2;
            $sensor->adc1_weight3 = $request->adc1_weight3;

            $sensor->adc2_weight1 = $request->adc2_weight1;
            $sensor->adc2_weight2 = $request->adc2_weight2;
            $sensor->adc2_weight3 = $request->adc2_weight3;

            $sensor->pwm = $request->pwm;
            
            // save data
            $success = $sensor->save();
            
            if(!$success) {
                return Response::json("Gagal insert data", 500);
            }

            return Response::json("Sukses insert data", 201);

        }        
    }

    
    // show: menampilkan data by id
    public function show(Request $request, $id) {
        
        // validasi
        if($request->isMethod('get')) {
            
            // retrieve model by id
            $sensor = Sensor::findOrFail($id);
            return Response::json($sensor, 200);

        } else 
            return Response::json("Request not using get method", 500);
    }
    
    
    // update: mengupdate isi database berdasarkan id
    public function update(Request $request, $id) {
        
        // validasi
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                // adc data
                'adc_1' => 'required|integer',
                'adc_2' => 'required|integer',
    
                // adc weight
                'adc1_weight1' => 'required',
                'adc1_weight2' => 'required',
                'adc1_weight3' => 'required',
    
                'adc2_weight1' => 'required',
                'adc2_weight2' => 'required',
                'adc2_weight3' => 'required',
    
                // pwm value
                'pwm' => 'required|integer'
            ]);

            $sensor = Sensor::findOrFail($id);

            $sensor->adc_1 = $request->adc_1;
            $sensor->adc_2 = $request->adc_2;

            $sensor->adc1_weight1 = $request->adc1_weight1;
            $sensor->adc1_weight2 = $request->adc1_weight2;
            $sensor->adc1_weight3 = $request->adc1_weight3;

            $sensor->adc2_weight1 = $request->adc2_weight1;
            $sensor->adc2_weight2 = $request->adc2_weight2;
            $sensor->adc2_weight3 = $request->adc2_weight3;

            $sensor->pwm = $request->pwm;
            
            $success = $sensor->save();
            if (!$success) 
                return Response::json("Gagal update data", 500);
            
            return Response::json("sukses update data", 201);
        }
    }
    
    
    // delete: menghapus isi data dari db berdasarkan id
    public function delete(Request $request, $id) {
        $sensor = Sensor::findOrFail($id);
        
        if (!($sensor->delete())) {
            return Response::json("Gagal hapus data", 500);
        } else 
            return Response::json("Sukses hapus data", 200); 

    }
}
