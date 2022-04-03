<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'id_nelayan',
        'id_jasa_pengantaran',
        'alamat',
        'pembayaran',
        'total_pembayaran',
        'ongkos_kirim',
        'total_jasa',
        'status'
    ];

    protected $table = 'transactions';

    public function user(){
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    public function items(){
        return $this->hasMany(DetailTransaction::class, 'id_transactions', 'id');
    }

    public function jasaPengantaran(){
        return $this->belongsTo(JasaPengantaran::class, 'id_jasa_pengantaran', 'id');
    }

    public function laporanHarian(){
        return $this->hasMany(LaporanHarian::class);
    }
}
