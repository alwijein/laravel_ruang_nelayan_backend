<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rincian extends Model
{
    use HasFactory;

    protected $table = 'rincian';

    protected $fillable = [
        'id_users',
        'id_hasil_tangkapan',
        'id_jasa_pengerjaan_ikan',
    ];



    public function users(){
        return $this->belongsTo(User::class, 'id_users');
    }

    public function hasilTangkapan(){
        return $this->belongsTo(HasilTangkapan::class, 'id_hasil_tangkapan');
    }

    public function konfirmasiPesanan(){
        return $this->hasMany(KonfirmasiPesanan::class);
    }

    public function jasaPengerjaanIkan(){
        return $this->belongsTo(JasaPengerjaanIkan::class, 'id_jasa_pengerjaan_ikan');
    }
}
