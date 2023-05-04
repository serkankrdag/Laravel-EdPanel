<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurumlar extends Model
{
    use HasFactory;
    protected $table='kurumlar';
    protected $fillable=['isim','sehir','ucret','lisansbitis','logo','durum','mail','telefon','adres'];
}
