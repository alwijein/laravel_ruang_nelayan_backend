<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\JasaPengerjaanIkan;
use Illuminate\Http\Request;

class JenisPengerjaanIkanController extends Controller
{
    public function getAll(){
        $jenisPengerjaanIkan = JasaPengerjaanIkan::all();

        if($jenisPengerjaanIkan){
            return ResponseFormatter::success($jenisPengerjaanIkan, 'Data Pengerjaan Ikan Berhasil Diambil');
        }else{
            return ResponseFormatter::error(null, 'Data Pengerjaan Ikan Tidak Ada', 404);
        }
}
}
