<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\JenisIkan;
use Illuminate\Http\Request;

class JenisIkanController extends Controller
{
    public function getAll(){
            $jenisIkan = JenisIkan::all();

            if($jenisIkan){
                return ResponseFormatter::success($jenisIkan, 'Data Jenis Ikan Berhasil Diambil');
            }else{
                return ResponseFormatter::error(null, 'Data Jenis Ikan Tidak Ada', 404);
            }
    }
}
