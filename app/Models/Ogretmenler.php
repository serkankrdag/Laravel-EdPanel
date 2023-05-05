<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ogretmenler extends Model
{
    use HasFactory;
    protected $table='ogretmenler';
    protected $fillable=['isim','eposta','sinif','konu','telefon','mail','sifre','durum','kurum'];
}
