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
        Schema::table('integrantes', function (Blueprint $table) {
            $table->string('gestante')->nullable()->after('vinculo');
            $table->string('gestacionMeses')->nullable()->after('gestante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('integrantes', function (Blueprint $table) {
            $table->dropColumn('gestante');
            $table->dropColumn('gestacionMeses');
        });
    }
};