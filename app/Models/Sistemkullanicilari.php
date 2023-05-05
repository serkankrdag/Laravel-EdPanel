<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistemkullanicilari extends Model
{
    use HasFactory;
    protected $table='sistemkullanicilari';
    protected $fillable=['isim','eposta','parola','telefon','resim','yetki','durum'];
}
