<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videolar', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->string('detay');
            $table->string('sinifId');
            $table->string('konuId');
            $table->string('videosure');
            $table->string('videokod');
            $table->string('video')->nullable();
            $table->string('resim')->nullable();
            $table->string('durum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videolar');
    }
};
