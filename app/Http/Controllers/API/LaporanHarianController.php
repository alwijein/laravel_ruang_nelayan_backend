<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\LaporanHarian;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanHarianController extends Controller
{
    public function getAll(Request $request){

        $limit = $request->input('limit');

        $laporanHarian = LaporanHarian::with([ 'users'])->where('id_users', Auth::user()->id);

        return ResponseFormatter::success(
            $laporanHarian->paginate($limit),
            'Data hasil tangkapan ikan berhasil diambil'
        );
    }

    public function inputLaporan(){
        try{
            $laporanHarian = LaporanHarian::create([
                'id_users' => Auth::user()->id,
            ]);

            return ResponseFormatter::success(['data' => $laporanHarian], 'Data Berhasil Di input');

        }catch(Exception $error){
            return ResponseFormatter::error(['message' => 'something went wrong' , 'error' => $error], "Data gagal ditambahkan", '500');
        }
    }
}
