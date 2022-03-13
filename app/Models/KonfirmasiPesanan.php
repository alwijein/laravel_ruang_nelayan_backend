<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiPesanan extends Model
{
    use HasFactory;
    protected $table = 'konfirmasi_pesanan';

    protected $fillable = [
        'id_rincian',
        'id_pengantaran',
        'status',
    ];

    public function rincian(){
        return $this->belongsTo(Rincian::class, 'id_rincian');
    }

    public function pengantaran(){
        return $this->belongsTo(Pengantaran::class, 'id_pengantaran');
    }

    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }

}
