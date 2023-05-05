<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smsayar extends Model
{
    use HasFactory;
    protected $table='smsayar';
    protected $fillable=['baslik','kulAdi','parola'];
}
