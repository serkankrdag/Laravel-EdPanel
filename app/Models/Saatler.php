<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saatler extends Model
{
    use HasFactory;
    protected $table='saatler';
    protected $fillable=['isim','baslangic','bitis','sira','durum','kurum'];
}
