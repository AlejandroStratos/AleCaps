<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyBarrioIdNullableInFamiliasTable extends Migration
{
    public function up(): void
    {
        Schema::table('familias', function (Blueprint $table) {
            $table->unsignedInteger('barrioId')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('familias', function (Blueprint $table) {
            $table->unsignedInteger('barrioId')->nullable(false)->change();
        });
    }
}

