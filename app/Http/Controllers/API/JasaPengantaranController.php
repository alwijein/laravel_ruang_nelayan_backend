<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\JasaPengantaran;
use Illuminate\Http\Request;

class JasaPengantaranController extends Controller
{
    public function getAll(){
        $jasaPengantaran = JasaPengantaran::all();

            if($jasaPengantaran){
                return ResponseFormatter::success($jasaPengantaran, 'Data Berhasil Diambil');
            }else{
                return ResponseFormatter::error(null, 'Data Tidak Ada', 404);
            }
    }
}
