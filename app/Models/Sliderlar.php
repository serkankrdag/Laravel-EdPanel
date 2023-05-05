<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliderlar extends Model
{
    use HasFactory;
    protected $table='sliderlar';
    protected $fillable=['baslik','link','sira','resim','durum','kurum'];
}
