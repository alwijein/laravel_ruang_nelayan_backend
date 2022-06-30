<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkanAirLaut extends Model
{
    use HasFactory;

    protected $table = 'ikan_air_laut';

    protected $fillable = [
        'img',
        'title',
    ];

    public function takeImage(){
        return "storage/" . $this->img;
    }
}
