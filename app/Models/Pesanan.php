<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'id_konfirmasi_pesanan',
        'id_metode_pembayaran',
        'status',
    ];



    public function konfirmasiPesanan(){
        return $this->belongsTo(KonfirmasiPesanan::class, 'id_konfirmasi_pesanan');
    }

    public function metodePembayaran(){
        return $this->hasMany(MetodePembayaran::class, 'id_metode_pembayaran');
    }
}
