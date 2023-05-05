<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yemekmenu extends Model
{
    use HasFactory;
    protected $table='yemekmenu';
    protected $fillable=['kahvalti','ogleyemek','araogun','durum','kurum'];
}
