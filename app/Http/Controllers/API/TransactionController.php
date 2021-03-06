<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaction;
use App\Models\HasilTangkapan;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function all(Request $request){
        $id = $request->input('id');
        $limit = $request->input('limit');
        $status = $request->input('status');
        $created_at = $request->input('created_at');


        if($id){

            $transaction = Transaction::with(['items.hasilTangkapan'])->find($id);

            if($transaction){
                return ResponseFormatter::success($transaction, 'Data transaksi berhasil diambil');
            }else{
                return ResponseFormatter::error(null, 'Data transaksi tidak ada', 404);
            }
        }

        $transaction = Transaction::with(['items.hasilTangkapan', 'user'])->where('id_users', Auth::user()->id)->orWhere('id_nelayan', Auth::user()->id);

        if($status){
            $transaction->where('status', $status);
        }

        if($created_at){
            $transaction->whereDate('created_at', $created_at);
        }

        return ResponseFormatter::success($transaction->paginate($limit), 'Data list transaksi berhasil diambil');

    }

    public function checkout(Request $request){
        $request->validate([
            'items' => ['required', 'array'],
            'items.*.id' => ['exists:hasil_tangkapan,id'],
            'id_nelayan' => ['required'],
            'total_pembayaran' => ['required'],
            'ongkos_kirim' => ['required'],
            'total_jasa' => ['required'],
            'status' => ['required'],
            'tipe_pengantaran' => ['required'],
            'pembayaran' => ['required'],
        ]);


        $transaction = Transaction::create([
            'id_users' => Auth::user()->id,
            'id_nelayan' => $request->id_nelayan,
            'alamat' => $request->alamat,
            'total_pembayaran' => $request->total_pembayaran,
            'ongkos_kirim' => $request->ongkos_kirim,
            'nama_jasa' => $request->nama_jasa,
            'total_jasa' => $request->total_jasa,
            'status' => $request->status,
            'tipe_pengantaran' => $request->tipe_pengantaran,
            'pembayaran' => $request->pembayaran,
        ]);

        foreach($request->items as $hasilTangkapan){
            DetailTransaction::create([
                'id_users' => Auth::user()->id,
                'id_hasil_tangkapan' => $hasilTangkapan['id'],
                'id_transactions' => $transaction->id,
                'quantity' => $hasilTangkapan['quantity'],
            ]);
        }


        return ResponseFormatter::success([$transaction->load('items.hasilTangkapan')], 'Transaksi Berhasil');
    }

    public function confirmStatus(Request $request){
        $id = $request->input('id');
        $qty = $request->input('qty');
        $idHasilTangkapan = $request->input('idHasilTangkapan');

        try {

            if($id){
                $transaction = Transaction::where('id', $id)->update([
                    'status' => 'SUDAH DI KONFIRMASI',
                ]);
            }

            $hasilTangkapan = HasilTangkapan::where('id', $idHasilTangkapan)->update([
                'jumlah' => $request->qty,
            ]);


            return ResponseFormatter::success($transaction, 'Berhasil Konfirmasi');


        } catch (Exception $error) {
            return ResponseFormatter::error([
                'massage' => 'Something went wrong',
                'error' => $error,
            ], 'Updated Failed', 500);
        }
    }
}
