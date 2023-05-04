<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videolar extends Model
{
    use HasFactory;
    protected $table='videolar';
    protected $fillable=['baslik','detay','sinifId','konuId','videosure','videokod','video','resim','durum','kurum'];
}
