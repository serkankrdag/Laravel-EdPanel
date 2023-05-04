<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siniflar extends Model
{
    use HasFactory;
    protected $table='siniflar';
    protected $fillable=['isim','sira','durum','kurum'];
}
