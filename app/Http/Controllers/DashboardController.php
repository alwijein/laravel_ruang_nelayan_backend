<?php

namespace App\Http\Controllers;

use App\Models\HasilTangkapan;
use App\Models\IkanAirTawar;
use App\Models\JasaPengantaran;
use App\Models\JasaPengerjaanIkan;
use App\Models\JenisIkan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        $user = User::all()->where('role', '!=', 'admin')->count();
        $userNelayan = User::where('role', 'nelayan')->count();
        $userCostumer = User::where('role', 'costumer')->count();

        $jenisIkan = JenisIkan::all()->count();
        $jasaPengerjaan = JasaPengerjaanIkan::all()->count();
        $kurir = JasaPengantaran::all()->count();
        $ikanAirTawar = IkanAirTawar::all()->count();
        // $ikanAirLaut = I::all()->count();

        return view('home.dashboard', compact([
            'user', 'userNelayan', 'userCostumer', 'jenisIkan', 'jasaPengerjaan', 'kurir', 'ikanAirTawar'
        ]));
    }
}
