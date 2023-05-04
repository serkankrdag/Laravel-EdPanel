<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gunler extends Model
{
    use HasFactory;
    protected $table='Gunler';
    protected $fillable=['GunAdi','KonuId','DersId'];
}
