<?php

namespace App\Http\Controllers;

use App\Models\JasaPengantaran;
use App\Models\JasaPengerjaanIkan;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    public function showKurir(){
        $kurir = JasaPengantaran::all();
        return view('kurir_management.show_kurir', compact('kurir'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
            'biaya' => ['required']
        ]);

        JasaPengantaran::create([
            'name' => $request->name,
            'biaya' => $request->biaya
        ]);

        return redirect('show-kurir/pengantaran');
    }

    public function showJasaPengerjaanIkan(){
        $jasaPengerjaan = JasaPengerjaanIkan::all();
        return view('kurir_management.show_pengerjaan_ikan', compact('jasaPengerjaan'));
    }

    public function storeJasaPengerjaanIkan(Request $request){
        $request->validate([
            'jenis_pengerjaan_ikan' => ['required'],
            'biaya' => ['required']
        ]);

        JasaPengerjaanIkan::create([
            'jenis_pengerjaan_ikan' => $request->jenis_pengerjaan_ikan,
            'biaya' => $request->biaya
        ]);

        return redirect('show-kurir/jasa-pengerjaan');
    }

    public function editKurir($id){
        $kurir = JasaPengantaran::where('id', $id)->first();
        return view('kurir_management.edit_kurir', compact('kurir'));
    }

    public function updateKurir(Request $request, $id){
        $request->validate([
            'name' => ['required'],
            'biaya' => ['required']
        ]);

        JasaPengantaran::where('id', $id)->update([
            'name' => $request->name,
            'biaya' => $request->biaya,
        ]);

        return redirect('show-kurir/pengantaran');
    }

    public function editPengerjaan($id){
        $data = JasaPengerjaanIkan::where('id', $id)->first();
        return view('kurir_management.edit_pengerjaan_ikan', compact('data'));
    }

    public function updatePengerjaan(Request $request, $id){
        $request->validate([
            'jenis_pengerjaan_ikan' => ['required'],
            'biaya' => ['required']
        ]);

        JasaPengerjaanIkan::where('id', $id)->update([
            'jenis_pengerjaan_ikan' => $request->jenis_pengerjaan_ikan,
            'biaya' => $request->biaya
        ]);

        return redirect('show-kurir/jasa-pengerjaan');
    }

}
