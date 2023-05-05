<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('saatler', function (Blueprint $table) {
            $table->id();
            $table->string('isim');
            $table->string('baslangic');
            $table->string('bitis');
            $table->string('sira');
            $table->string('durum');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('saatler');
    }
};
