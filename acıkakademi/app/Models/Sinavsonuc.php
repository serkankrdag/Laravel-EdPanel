<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinavsonuc extends Model
{
    use HasFactory;
    protected $table='sinavsonuc';
    protected $fillable=['ogrencino','ogrenci','sinif','kitapciktur','turkcedogru','turkceyanlis',
        'turkcenet','turkcetestgenel','matematikdogru','matematikyanlis','matematiknet','matematiktestgenel',
        'dindogru','dinyanlis','dinnet','dintestgenel','fendogru','fenyanlis','fennet','fentestgenel',
        'sosyaldogru','sosyalyanlis','sosyalnet','sosyaltestgenel','ingilizcedogru','ingilizceyanlis','ingilizcenet','ingilizcetestgenel',
        'toplamdogru','toplamyanlis','toplamnet','toplampuan','sinavbasarisira','sinavturu','kurum','sinavid'];
}
