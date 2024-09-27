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
            $table->string('nacionalidad_otro')->nullable()->after('nacionalidad');
            $table->string('progSocial_otro')->nullable()->after('progSocial');
            $table->string('vinculo_otro')->nullable()->after('vinculo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('integrantes', function (Blueprint $table) {
            $table->dropColumn(['nacionalidad_otro', 'progSocial_otro', 'vinculo_otro']);
        });
    }
};