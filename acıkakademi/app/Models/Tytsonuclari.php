<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tytsonuclari extends Model
{
    use HasFactory;
    protected $table='tytsonuclari';
    protected $fillable=['ogrno','eposta','sinif','kitapcik','turkcedogru','turkceyanlis','turkcenet','turkcetestgenel','tarihdogru','tarihyanlis'
        ,'tarihnet','tarihtestgenel','cografyadogru','cografyayanlis','cografyanet','cografyatestgenel','felsefedogru','felsefeyanlis','felsefenet','felsefetestgenel','dindogru','dinyanlis'
        ,'dinnet','dintestgenel','matematikdogru','matematikyanlis','matematiknet','matematiktestgenel','fizikdogru','fizikyanlis','fiziknet','fiziktestgenel','kimyadogru','kimyayanlis','kimyanet',
        'kimyatestgenel','biyolojidogru','biyolojinet','biyolojitestgenel','toplamdogru','toplamyanlis','toplamnet','tytpuani','tytpuanigenelsiralama','sinavid'];
}
