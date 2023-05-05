<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ogretmenler', function (Blueprint $table) {
            $table->id();
            $table->string('isim');
            $table->string('eposta');
            $table->string('sinif');
            $table->string('konu');
            $table->string('telefon');
            $table->string('sifre');
            $table->string('durum');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ogretmenler');
    }
};
