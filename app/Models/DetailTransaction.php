<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'id_hasil_tangkapan',
        'id_transactions',
        'quantity'
    ];

    protected $table = 'detail_transactions';


    public function hasilTangkapan(){
        return $this->hasOne(HasilTangkapan::class, 'id', 'id_hasil_tangkapan');
    }
}
