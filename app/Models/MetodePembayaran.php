<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    use HasFactory;

    protected $table = 'metode_pembayaran';

    protected $fillable = [
        'metode_pembayaran',
        'status',
    ];

    public function pesanan(){
        return $this->belongsTo(Pesanan::class);
    }

}
