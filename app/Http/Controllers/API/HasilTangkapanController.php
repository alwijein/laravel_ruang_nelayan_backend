<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\HasilTangkapan;
use App\Models\Rincian;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class HasilTangkapanController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');

        $id_users = $request->input('id_users');

        // $all = HasilTangkapan::find(1)->rincian;
        // dd($all);
        if($id){
            $hasilTangkapan = HasilTangkapan::with(['users', 'jenisIkan', 'jasaPengerjaanIkan'])->find($id);
            if($hasilTangkapan){
                return ResponseFormatter::success($hasilTangkapan, 'Data Produk Berhasil Diambil');
            }else{
                return ResponseFormatter::error(null, 'Data Produk Tidak Ada', 404);
            }
        }

        $hasilTangkapan = HasilTangkapan::with(['users', 'jenisIkan', 'jasaPengerjaanIkan']);

        if ($id_users){
            $hasilTangkapan->where('id_users', $id_users);
        }

        return ResponseFormatter::success(
            $hasilTangkapan->paginate($limit),
            'Data hasil tangkapan ikan berhasil diambil'
        );
    }
}
