<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengantaran extends Model
{
    use HasFactory;

    protected $table = 'pengantaran';

    protected $fillable = [
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'jenis_jasa',
        'status',
    ];

    public function konfirmasiPesanan(){
        return $this->hasMany(KonfirmasiPesanan::class);
    }
}
