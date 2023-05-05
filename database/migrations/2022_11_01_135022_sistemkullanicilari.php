<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sistemkullanicilari', function (Blueprint $table) {
            $table->id();
            $table->string('isim');
            $table->string('eposta')->unique();
            $table->string('parola');
            $table->string('telefon')->nullable();
            $table->string('resim')->nullable();
            $table->boolean('yetki');
            $table->boolean('durum');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sistemkullanicilari');
    }
};
