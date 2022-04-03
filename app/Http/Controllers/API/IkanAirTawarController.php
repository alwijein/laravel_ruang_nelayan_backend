<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\IkanAirTawar;
use Illuminate\Http\Request;

class IkanAirTawarController extends Controller
{
    public function create(Request $request){
        try {
            $request->validate([
                'title' => ['required', 'string'],
            ]);



        $ikanAirTawar = IkanAirTawar::create([
            'title' => $request->title,
            'img' => $request->img,
        ]);

        return ResponseFormatter::success(['data' => $ikanAirTawar], 'Data berhasil ditambahkan');
        } catch (\Exception $error) {
            return ResponseFormatter::error(['message' => 'something went wrong' , 'error' => $error], "Data gagal ditambahkan", '500');
        }
    }

    public function getAll(){
        $ikanAirTawar = IkanAirTawar::all();

            if($ikanAirTawar){
                return ResponseFormatter::success($ikanAirTawar, 'Data Berhasil Diambil');
            }else{
                return ResponseFormatter::error(null, 'Data Tidak Ada', 404);
            }
    }
}
