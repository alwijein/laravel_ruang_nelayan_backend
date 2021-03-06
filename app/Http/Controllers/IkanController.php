<?php

namespace App\Http\Controllers;

use App\Models\IkanAirLaut;
use App\Models\IkanAirTawar;
use App\Models\JasaPengerjaanIkan;
use App\Models\JenisIkan;
use Illuminate\Http\Request;

class IkanController extends Controller
{
    public function showJenisIkan(){
        $jenisIkan = JenisIkan::all();
        return view('ikan_management.show_jenis_ikan', compact('jenisIkan'));
    }

    public function store(Request $request){
        $request->validate([
            'jenis_ikan' => ['required'],
            'keterangan' => ['required']
        ]);

        JenisIkan::create([
            'jenis_ikan' => $request->jenis_ikan,
            'keterangan' => $request->keterangan
        ]);

        return redirect('show-ikan/jenis');
    }


    public function editJenis($id){
        $jenisIkan = JenisIkan::where('id', $id)->first();
        return view('ikan_management.edit_jenis_ikan', compact('jenisIkan'));
    }

    public function updateJenis(Request $request, $id){
        $request->validate([
            'jenis_ikan' => ['required'],
            'keterangan' => ['required']
        ]);

        JenisIkan::where('id', $id)->update([
            'jenis_ikan' => $request->jenis_ikan,
            'keterangan' => $request->keterangan
        ]);

        return redirect('show-ikan/jenis');
    }

    public function showIkanAirTawar(){
        $ikanAirTawar = IkanAirTawar::all();
        return view('ikan_management.show_ikan_air_tawar', compact('ikanAirTawar'));
    }

    public function storeIkanAirTawar(Request $request){
        $request->validate([
            'title' => ['required'],
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        // Assign Image
        $thumbnail = request()->file('img');
        $name = date('YmdHi')."-".$thumbnail->getClientOriginalName();
        $thumbnailUrl = $thumbnail->storeAs("images/ikan",$name);

        IkanAirTawar::create([
            'title' => $request->title,
            'img' => $thumbnailUrl,
        ]);

        return redirect('show-ikan/air-tawar');
    }

    public function editTawar($id){
        $data = IkanAirTawar::where('id', $id)->first();
        return view('ikan_management.edit_ikan_air_tawar', compact('data'));
    }

    public function updateTawar(Request $request, $id){
        $request->validate([
            'title' => ['required'],
        ]);

        IkanAirTawar::where('id', $id)->update([
            'title' => $request->title,
        ]);

        return redirect('show-ikan/air-tawar');
    }

    public function showIkanAirLaut(){
        $ikanAirLaut = IkanAirLaut::all();
        return view('ikan_management.show_ikan_air_laut', compact('ikanAirLaut'));
    }

    public function storeIkanAirLaut(Request $request){
        $request->validate([
            'title' => ['required'],
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        // Assign Image
        $thumbnail = request()->file('img');
        $name = date('YmdHi')."-".$thumbnail->getClientOriginalName();
        $thumbnailUrl = $thumbnail->storeAs("images/ikan",$name);

        IkanAirLaut::create([
            'title' => $request->title,
            'img' => $thumbnailUrl,
        ]);

        return redirect('show-ikan/air-laut');
    }


    public function editLaut($id){
        $data = IkanAirLaut::where('id', $id)->first();
        return view('ikan_management.edit_ikan_air_laut', compact('data'));
    }

    public function updateLaut(Request $request, $id){
        $request->validate([
            'title' => ['required'],
        ]);

        IkanAirLaut::where('id', $id)->update([
            'title' => $request->title,
        ]);

        return redirect('show-ikan/air-laut');
    }

    public function destroyJasa($id){
        $pengerjaanIkan = JasaPengerjaanIkan::where('id', $id)->first();
        $pengerjaanIkan->delete();

        return redirect(route('show-jasa-pengerjaan'));
    }

    public function destroyJenis($id){
        $data = JenisIkan::where('id', $id)->first();
        $data->delete();

        return redirect(route('show-jenis-ikan'));
    }

    public function destroyLaut($id){
        $data = IkanAirLaut::where('id', $id)->first();
        $data->delete();

        return redirect(route('show-air-laut'));
    }

    public function destroyTawar($id){
        $data = IkanAirTawar::where('id', $id)->first();
        $data->delete();

        return redirect(route('show-air-tawar'));
    }

}
