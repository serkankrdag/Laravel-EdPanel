<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('zoom', function (Blueprint $table) {
            $table->id();
            $table->string('apimail');
            $table->string('zoomkey');
            $table->string('apisecret');
            $table->string('kurumId');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zoom');
    }
};
