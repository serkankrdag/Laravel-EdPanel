<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odevler extends Model
{
    use HasFactory;
    protected $table='odevler';
    protected $fillable=['baslik','aciklama','sinif','konu','bitistarih','link','dosya','ogretmen','kurum'];
}
