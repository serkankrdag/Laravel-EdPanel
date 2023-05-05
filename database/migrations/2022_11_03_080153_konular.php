<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('konular', function (Blueprint $table) {
            $table->id();
            $table->string('isim');
            $table->string('sinifId')->nullable();
            $table->string('durum');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('konular');
    }
};
