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
    ];


    public function rincian(){
        return $this->hasMany(Rincian::class);
    }

    public function hasilTangkapan(){
        return $this->hasMany(HasilTangkapan::class);
    }
}
