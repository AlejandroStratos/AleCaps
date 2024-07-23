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
        Schema::create('barrios', function (Blueprint $table) {
            $table->integerIncrements('barrioId');
            $table->string('nombreBarrio');
            $table->unsignedInteger('capId');
            $table->foreign('capId')->references('capId')->on('caps');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('barrios');
    }
};

