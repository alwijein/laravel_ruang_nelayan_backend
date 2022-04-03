<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaPengantaran extends Model
{
    use HasFactory;

    protected $table = 'jasa_pengantaran';

    protected $fillable = [
        'img',
        'nama',
        'biaya',
    ];
}
