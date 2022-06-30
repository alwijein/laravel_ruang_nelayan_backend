<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkanAirTawar extends Model
{
    use HasFactory;

    protected $table = 'ikan_air_tawar';

    protected $fillable = [
        'img',
        'title',
    ];
    public function takeImage(){
        return "storage/" . $this->img;
    }
}
