<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('yoneticiler', function (Blueprint $table) {
            $table->id();
            $table->string('kurumId');
            $table->string('kullaniciId');
            $table->string('eposta')->unique();
            $table->string('parola');
            $table->boolean('durum');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('yoneticiler');
    }
};
