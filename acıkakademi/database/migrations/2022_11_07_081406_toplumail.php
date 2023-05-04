<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('toplumail', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->string('detay');
            $table->string('sinifId');
            $table->string('kullanici');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('toplumail');
    }
};
