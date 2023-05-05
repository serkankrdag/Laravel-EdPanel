<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('kurumlar', function (Blueprint $table) {
            $table->id();
            $table->string('isim');
            $table->string('sehir');
            $table->string('ucret');
            $table->string('lisansbitis');
            $table->string('logo')->nullable();
            $table->boolean('durum');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kurumlar');
    }
};
