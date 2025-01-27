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
        Schema::table('patientrecord', function (Blueprint $table) {
            $table->dropUnique(['PhilhealthNumber']);
            $table->string('PhilhealthNumber')->nullable()->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patientrecord', function (Blueprint $table) {
            $table->string('PhilhealthNumber')->nullable(false)->unique()->change();
        });
    }
};
