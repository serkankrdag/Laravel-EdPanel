<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toplumail extends Model
{
    use HasFactory;
    protected $table='toplumail';
    protected $fillable=['baslik','detay','sinifId','kullanici'];
}
