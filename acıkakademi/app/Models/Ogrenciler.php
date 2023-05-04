<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ogrenciler extends Model
{
    use HasFactory;
    protected $table='ogrenciler';
    protected $fillable=['isim','eposta','telefon','sinifId','sifre','durum','kurum'];
}
