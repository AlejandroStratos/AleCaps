<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->integerIncrements('encuestaId');
            $table->string('accSalud1');
            $table->string('accSalud2');
            $table->string('accSalud3')->nullable();
            $table->string('accSalud3_otro')->nullable();
            $table->string('accSalud4')->nullable();
            $table->string('accSalud4_otro')->nullable();
            $table->string('accSalud5');
            $table->string('accSalud6');
            $table->string('accSalud7');
            $table->string('accSalud8');
            $table->string('accSalud9')->nullable();
            $table->string('accSalud9_otro')->nullable();
            $table->string('accMental1');
            $table->string('accMental2');
            $table->string('prSoysa')->nullable();
            $table->string('prSoysa_otro')->nullable();
            $table->string('alimantacion1');
            $table->string('alimentacion2');
            $table->string('alimentacion3');
            $table->string('alimentacion4');
            $table->string('partSocial');
            $table->string('vivienda1');
            $table->string('vivienda2')->nullable();
            $table->string('vivienda2_otro')->nullable();
            $table->string('vivienda3');
            $table->string('vivienda4');
            $table->string('vivienda5');
            $table->string('vivienda6');
            $table->string('vivienda7');
            $table->string('accBas1');
            $table->string('accBas2');
            $table->string('accBas3');
            $table->string('accBas4');
            $table->unsignedInteger('famId');
            $table->unsignedInteger('capId');
            $table->foreign('famId')->references('famId')->on('familias')->cascadeOnDelete();
            $table->foreign('capId')->references('capId')->on('caps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
