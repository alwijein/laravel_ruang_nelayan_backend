<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\IkanAirLaut;
use App\Models\IkanAirTawar;
use Illuminate\Http\Request;

class IkanAirLautController extends Controller
{
    public function create(Request $request){
        try {
            $request->validate([
                'title' => ['required', 'string'],
            ]);



        $ikanAirLaut = IkanAirLaut::create([
            'title' => $request->title,
            'img' => $request->img,
        ]);

        return ResponseFormatter::success(['data' => $ikanAirLaut], 'Data berhasil ditambahkan');
        } catch (\Exception $error) {
            return ResponseFormatter::error(['message' => 'something went wrong' , 'error' => $error], "Data gagal ditambahkan", '500');
        }
    }

    public function getAll(){
        $ikanAirLaut = IkanAirLaut::all();

            if($ikanAirLaut){
                return ResponseFormatter::success($ikanAirLaut, 'Data Berhasil Diambil');
            }else{
                return ResponseFormatter::error(null, 'Data Tidak Ada', 404);
            }
    }
}
