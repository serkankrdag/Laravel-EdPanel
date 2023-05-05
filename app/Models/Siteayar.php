<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siteayar extends Model
{
    use HasFactory;
    protected $table='siteayar';
    protected $fillable=['title','keywords','description','telefon','whatsApp','mail','facebook','twitter','instagram','linkedin','youtube','logo','favicon'];
}
