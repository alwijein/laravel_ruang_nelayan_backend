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
        'id_jasa_pengerjaan_ikan',
        'id_jenis_ikan',
        'nama_ikan',
        'jumlah',
        'harga',
        'total',
    ];


    public function users(){
        return $this->belongsTo(User::class, 'id_users');
    }

    public function jenisIkan(){
        return $this->belongsTo(JenisIkan::class, 'id_jenis_ikan');
    }

    public function rincian(){
        return $this->hasMany(Rincian::class);
    }

    public function jasaPengerjaanIkan(){
        return $this->belongsTo(JasaPengerjaanIkan::class, 'id_jasa_pengerjaan_ikan');
    }

}
