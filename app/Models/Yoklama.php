<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yoklama extends Model
{
    use HasFactory;
    protected $table='yoklama';
    protected $fillable=['programId','ogrenciId','yoklama','kurum'];
}
