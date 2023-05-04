<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelenodev extends Model
{
    use HasFactory;
    protected $table='gelenodev';
    protected $fillable=['detay','odevfile','ogrenci','odev','kurum','durum'];
}
