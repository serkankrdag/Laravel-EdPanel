<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailayar extends Model
{
    use HasFactory;
    protected $table='mailayar';
    protected $fillable=['host','kulAdi','parola','port'];
}
