<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dersprogramlari', function (Blueprint $table) {
            $table->id();
            $table->string('konuId');
            $table->string('ogretmenId');
            $table->string('saatId');
            $table->string('sinifId');
            $table->string('tarih');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dersprogramlari');
    }
};
