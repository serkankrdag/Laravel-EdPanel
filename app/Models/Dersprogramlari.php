<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dersprogramlari extends Model
{
    use HasFactory;
    protected $table='dersprogramlari';
    protected $fillable=['konuId','ogretmenId','saatId','sinifId','tarih','gun','kurum','GunId'];
}
