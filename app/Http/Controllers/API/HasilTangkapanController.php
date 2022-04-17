<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\HasilTangkapan;
use Illuminate\Http\Request;

class HasilTangkapanController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');

        $id_users = $request->input('id_users');

        $namaIkan = $request->input('nama_ikan');

        $created_at = $request->input('created_at');

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

        $hasilTangkapan = HasilTangkapan::with(['users', 'jenisIkan', 'jasaPengerjaanIkan'])->where('jumlah', '!=' , 0);

        if ($id_users){
            $hasilTangkapan->where('id_users', $id_users);
        }

        if($namaIkan){
            $hasilTangkapan->where('nama_ikan', $namaIkan);
        }

        if($created_at){
            $hasilTangkapan->whereDate('created_at', $created_at);
        }


        return ResponseFormatter::success(
            $hasilTangkapan->paginate($limit),
            'Data hasil tangkapan ikan berhasil diambil'
        );
    }

    public function tambahIkan(Request $request){
        try {
            $request->validate([
                'id_users' => ['required'],
                'nama_ikan' => ['required', 'string'],
                'id_jenis_ikan' => ['required'],
                'jumlah' => ['required'],
                'harga' => ['required'],
                'gambar' => ['required'],
                'id_jasa_pengerjaan_ikan' => ['required'],
            ]);

        $hasilTangkapan = HasilTangkapan::create([
            'id_users' => $request->id_users,
            'nama_ikan' => $request->nama_ikan,
            'id_jenis_ikan' => $request->id_jenis_ikan,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'gambar' => $request->gambar,
            'id_jasa_pengerjaan_ikan' => $request->id_jasa_pengerjaan_ikan,
        ]);

        return ResponseFormatter::success(['data' => $hasilTangkapan], 'Data hasil tangkapan berhasil diambil');
        } catch (\Exception $error) {
            return ResponseFormatter::error(['message' => 'something went wrong' , 'error' => $error], "Data gagal ditambahkan", '500');
        }
    }

    public function updateIkan(Request $request){
        try {
            $id = $request->input('id');

            $request->validate([
                'id_users' => ['required'],
                'nama_ikan' => ['required', 'string'],
                'id_jenis_ikan' => ['required'],
                'jumlah' => ['required'],
                'harga' => ['required'],
                'gambar' => ['required'],
                'id_jasa_pengerjaan_ikan' => ['required'],
            ]);


        $hasilTangkapan = HasilTangkapan::where('id', $id)->update([
            'id_users' => $request->id_users,
            'nama_ikan' => $request->nama_ikan,
            'id_jenis_ikan' => $request->id_jenis_ikan,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'gambar' => $request->gambar,
            'id_jasa_pengerjaan_ikan' => $request->id_jasa_pengerjaan_ikan,
        ]);

        return ResponseFormatter::success($hasilTangkapan, 'Data berhasil di update');
        } catch (\Exception $error) {
            return ResponseFormatter::error(['message' => 'something went wrong' , 'error' => $error], "Data gagal ditambahkan", '500');
        }
    }
}
