<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTangkapan extends Model
{
    use HasFactory;

    protected $table = 'hasil_tangkapan';

    protected $fillable = [
        'id_users',
        'id_jenis_ikan',
        'nama_ikan',
        'jumlah',
        'harga',
        'gambar',
        'total',
    ];


    public function users(){
        return $this->belongsTo(User::class, 'id_users');
    }

    public function jenisIkan(){
        return $this->belongsTo(JenisIkan::class, 'id_jenis_ikan');
    }

    public function laporanHarian(){
        return $this->hasMany(LaporanHarian::class);
    }

    public function jenisPengerjaanIkan(){
        return $this->hasMany(TangkapanHasPengerjaan::class, 'id_hasil_tangkapan', 'id');
    }

}
