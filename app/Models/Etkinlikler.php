<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etkinlikler extends Model
{
    use HasFactory;
    protected $table='etkinlikler';
    protected $fillable=['baslik','detay','sinifId','resim','resimler','kurum'];
}
