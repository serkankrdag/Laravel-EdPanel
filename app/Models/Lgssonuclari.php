<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lgssonuclari extends Model
{
    use HasFactory;
    protected $table='lgssonuclari';
    protected $fillable=['eposta','sinifId','ogrenciId','sinavAdi','sinavTarihi','sinavTuru','sinavNo','tdogru','tyanlis','tardogru'
        ,'taryanlis','cogdogru','cogyanlis','feldogru','felyanlis','dindogru','dinyanlis','matdogru','matyanlis','fizdogru','fizyanlis','kimdogru'
        ,'kimyanlis','biydogru','biyyanlis','lgspuan','derece','kurum'];
}
