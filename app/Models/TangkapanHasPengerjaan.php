<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TangkapanHasPengerjaan extends Model
{
    use HasFactory;

    protected $table = 'tangkapan_has_pengerjaan';

    protected $fillable = [
        'id_jasa_pengerjaan_ikan',
        'id_hasil_tangkapan',
    ];

    public function hasilTangkapan(){
        return $this->hasOne(HasilTangkapan::class, 'id', 'id_hasil_tangkapan');
    }

    public function jasaPengerjaanIkan(){
        return $this->hasOne(JasaPengerjaanIkan::class, 'id', 'id_jasa_pengerjaan_ikan');
    }
}
