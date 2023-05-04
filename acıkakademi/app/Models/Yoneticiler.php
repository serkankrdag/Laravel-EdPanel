<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yoneticiler extends Model
{
    use HasFactory;
    protected $table='yoneticiler';
    protected $fillable=['kurumId','kullaniciId','eposta','parola','durum','kurum'];
}
