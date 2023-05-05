<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bloglar', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->string('detay');
            $table->string('resim')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bloglar');
    }
};
