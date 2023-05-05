<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloglar extends Model
{
    use HasFactory;
    protected $table='bloglar';
    protected $fillable=['baslik','detay','resim','kurum'];
}
