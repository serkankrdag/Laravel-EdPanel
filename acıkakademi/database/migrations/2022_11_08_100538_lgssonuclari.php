<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lgssonuclari', function (Blueprint $table) {
            $table->id();
            $table->string('eposta')->nullable();
            $table->string('sinifId')->nullable();
            $table->string('ogrenciId')->nullable();
            $table->string('sinavAdi')->nullable();
            $table->string('sinavTarihi')->nullable();
            $table->string('sinavTuru')->nullable();
            $table->string('sinavNo')->nullable();
            $table->string('tdogru')->nullable();
            $table->string('tyanlis')->nullable();
            $table->string('tardogru')->nullable();
            $table->string('taryanlis')->nullable();
            $table->string('cogdogru')->nullable();
            $table->string('cogyanlis')->nullable();
            $table->string('feldogru')->nullable();
            $table->string('felyanlis')->nullable();
            $table->string('dindogru')->nullable();
            $table->string('dinyanlis')->nullable();
            $table->string('matdogru')->nullable();
            $table->string('matyanlis')->nullable();
            $table->string('fizdogru')->nullable();
            $table->string('fizyanlis')->nullable();
            $table->string('kimdogru')->nullable();
            $table->string('kimyanlis')->nullable();
            $table->string('biydogru')->nullable();
            $table->string('biyyanlis')->nullable();
            $table->string('lgspuan')->nullable();
            $table->string('derece')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lgssonuclari');
    }
};
