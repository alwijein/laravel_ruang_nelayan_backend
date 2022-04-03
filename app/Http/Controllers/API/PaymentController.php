<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   public function getToken(Request $request){
       try{

        $request->validate([
            'total_harga' => ['required'],
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-5uj2VVb17KyaUE82IIV0a_Lk';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->total_harga,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return ResponseFormatter::success(['payment_token' => $snapToken], 'Token berhasil diambil');

    }catch(\Exception $error){
        return ResponseFormatter::error(['message' => 'something went wrong' , 'error' => $error], "Data gagal ditambahkan", '500');
    }






   }
}
