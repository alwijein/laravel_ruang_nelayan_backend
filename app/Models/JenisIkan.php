<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisIkan extends Model
{
    use HasFactory;
    protected $table = 'jenis_ikan';

    protected $fillable = [
        'jenis_ikan',
        'keterangan',
    ];

    public function hasilTangkapan(){
        return $this->hasMany(HasilTangkapan::class);
    }


}
