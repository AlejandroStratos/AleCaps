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
        Schema::create('integrantes', function (Blueprint $table) {
            $table->integerIncrements('intId');
            $table->string('apellido');
            $table->string('nombre');
            $table->date('fechaNac');
            $table->string('estadoDni');
            $table->string('genero');
            $table->string('nacionalidad');
            $table->string('vinculo');
            $table->string('nivelEduc');
            $table->string('ocupacion');
            $table->string('progSocial');
            $table->string('obraSocial');
            $table->string('enfermedadesCronicas');
            $table->date('ultimoControl');
            $table->unsignedInteger('famId');
            $table->foreign('famId')->references('famId')->on('familias')->cascadeOnDelete();
            $table->timestamps(); 

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('integrantes');
    }
};
