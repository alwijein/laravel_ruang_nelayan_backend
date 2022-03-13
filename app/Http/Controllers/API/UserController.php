<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Facade\FlareClient\Http\Client;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Psr\Http\Message\ServerRequestInterface;

class UserController extends Controller
{
    public function register(Request $request){
        try {
          $request->validate(
              [
                  'name' => ['required'],
                  'no_hp' => ['required', 'min:11', 'unique:users'],
                  'nik_ktp' => ['required', 'unique:users'],
                  'password' => ['required'],
              ],
          );

          User::create([
              'name' => $request->name,
              'no_hp' => $request->no_hp,
              'nik_ktp' => $request->nik_ktp,
              'password' => Hash::make($request->password),
          ]);

          $user = User::where('no_hp', $request->no_hp)->first();

          $tokenResult = $user->createToken('authToken')->plainTextToken;

          return ResponseFormatter::success(['access_token' => $tokenResult, 'token_type' => 'Bearer', $user], 'Data berhasil dibuat');

        } catch (\Exception $error) {
            return ResponseFormatter::error(['message' => 'something went wrong' , 'error' => $error], "Data gagal ditambahkan", '500');
        }
    }

    public function login(Request $request){
        try {
            $request->validate(
                [
                    'no_hp' => 'required',
                    'password' => 'required'
                ]
            );

            $credentials = request([
                'no_hp',
                'password'
            ]);

            if(!Auth::attempt($credentials)){
                return ResponseFormatter::error([
                    'massage' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            $user = User::where('no_hp', $request->no_hp)->first();

            if(!Hash::check($request->password, $user->password, [])){
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'tokenType' => 'Bearer',
                'user' => $user
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'massage' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }

    public function fetch(Request $request){
        return ResponseFormatter::success($request->user(), 'Data user berhasil diambil');
    }

    public function updateProfile(Request $request){
        try {
            $request->validate([
                'name' => ['required'],
                'no_hp' => ['required', 'string', 'max:255', 'unique:users,no_hp,'.$request->user()->id],
                'alamat' => ['string'],
            ]);

            $data = $request->all();

            $user = Auth::user();
            $user->update($data);

            return ResponseFormatter::success($user, 'Profil Updated');

        } catch (Exception $error) {
            return ResponseFormatter::error([
                'massage' => 'Something went wrong',
                'error' => $error,
            ], 'Updated Failed', 500);
        }
    }

    public function logout(Request $request){
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }
}