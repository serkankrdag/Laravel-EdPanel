<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veliler extends Model
{
    use HasFactory;
    protected $table='veliler';
    protected $fillable=['isim','eposta','telefon','sifre','ogrenciId','adres','durum','kurum'];
}
