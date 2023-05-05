<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sliderlar', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->string('link')->nullable();
            $table->string('sira');
            $table->string('resim')->nullable();
            $table->string('durum');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sliderlar');
    }
};
