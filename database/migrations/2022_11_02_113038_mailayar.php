<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mailayar', function (Blueprint $table) {
            $table->id();
            $table->string('host');
            $table->string('kulAdi');
            $table->string('parola');
            $table->string('port');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mailayar');
    }
};
