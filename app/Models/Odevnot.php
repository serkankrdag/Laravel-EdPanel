<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odevnot extends Model
{
    use HasFactory;
    protected $table='odevnot';
    protected $fillable=['ogrenci','odev','durum','kurum'];
}
