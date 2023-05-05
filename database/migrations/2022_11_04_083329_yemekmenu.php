<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('yemekmenu', function (Blueprint $table) {
            $table->id();
            $table->string('kahvalti');
            $table->string('ogleyemek');
            $table->string('araogun');
            $table->string('durum');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('yemekmenu');
    }
};
