<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Girisslider extends Model
{
    use HasFactory;
    protected $table='girisslider';
    protected $fillable=['baslik','resim','durum'];
}
