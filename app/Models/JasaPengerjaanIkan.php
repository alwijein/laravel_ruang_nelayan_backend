<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaPengerjaanIkan extends Model
{
    use HasFactory;

    protected $table = 'jasa_pengerjaan_ikan';

    protected $fillable = [
        'jenis_pengerjaan_ikan',
        'biaya',
    ];


    public function rincian(){
        return $this->hasMany(Rincian::class);
    }

    public function jenisPengerjaanIkan(){
        return $this->hasMany(TangkapanHasPengerjaan::class, 'id_jasa_pegerjaan_ikan', 'id');
    }
}
