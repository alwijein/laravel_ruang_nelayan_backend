<?php

namespace App\Http\Controllers;

use App\Models\JasaPengantaran;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    public function showKurir(){
        $kurir = JasaPengantaran::all();
        return view('kurir_management.show_kurir', compact('kurir'));
    }
}
