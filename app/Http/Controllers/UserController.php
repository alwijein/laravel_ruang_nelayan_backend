<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showNelayan(){
        $users = DB::table('users')->where('role' , 'nelayan')->get();
        return view('users_management.show_nelayan', compact('users'));
    }


    public function storeNelayan(Request $request){
        $request->validate([
            'name' => ['required',  'min:3'],
            'no_hp' => ['required', 'unique:users'],
            'role' => ['required'],
            'alamat' => ['required'],
            'nik_ktp' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::create([
                'name' => $request->name,
                'no_hp' => $request->no_hp,
                'role' => $request->role,
                'alamat' => $request->alamat,
                'avatar' => $request->avatar,
                'nik_ktp' => $request->nik_ktp,
                'password' => Hash::make($request->password)
            ]);
            return redirect('/show-nelayan');
    }


    public function editNelayan($id){
        $nelayan = User::where('id', $id)->first();
        return view('users_management.edit_nelayan', compact('nelayan'));
    }

    public function updateNelayan(Request $request, $id){
        $request->validate([
            'name' => ['required',  'min:3'],
            'no_hp' => ['required'],
            'role' => ['required'],
            'alamat' => ['required'],
            'nik_ktp' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
                'no_hp' => $request->no_hp,
                'role' => $request->role,
                'alamat' => $request->alamat,
                'avatar' => $request->avatar,
                'nik_ktp' => $request->nik_ktp,
                'password' => Hash::make($request->password)
        ]);

        return redirect('show-nelayan');
    }

    public function showCostumer(){
        $users = DB::table('users')->where('role' , 'costumer')->get();
        return view('users_management.show_costumer', compact('users'));
    }


    public function storeCostumer(Request $request){
        $request->validate([
            'name' => ['required',  'min:3'],
            'no_hp' => ['required', 'unique:users'],
            'role' => ['required'],
            'alamat' => ['required'],
            'nik_ktp' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::create([
                'name' => $request->name,
                'no_hp' => $request->no_hp,
                'role' => $request->role,
                'alamat' => $request->alamat,
                'avatar' => $request->avatar,
                'nik_ktp' => $request->nik_ktp,
                'password' => Hash::make($request->password)
            ]);
            return redirect('/show-costumer');
    }


    public function editCostumer($id){
        $costumer = User::where('id', $id)->first();
        return view('users_management.edit_costumer', compact('costumer'));
    }

    public function updateCostumer(Request $request, $id){
        $request->validate([
            'name' => ['required',  'min:3'],
            'no_hp' => ['required'],
            'role' => ['required'],
            'alamat' => ['required'],
            'nik_ktp' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
                'no_hp' => $request->no_hp,
                'role' => $request->role,
                'alamat' => $request->alamat,
                'avatar' => $request->avatar,
                'nik_ktp' => $request->nik_ktp,
                'password' => Hash::make($request->password)
        ]);

        return redirect('show-costumer');
    }

    // function for all

    public function destroy($id){
        $user = User::where('id', $id)->first();
        $user->delete();
        if($user->role == "costumer"){
            return redirect('show-costumer');
        }else{
            return redirect('show-nelayan');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }

}
