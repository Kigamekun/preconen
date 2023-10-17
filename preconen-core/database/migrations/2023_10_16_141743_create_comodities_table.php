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
        Schema::create('comodities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->default('text');
            $table->string('latin', 255)->default('text');
            $table->string('temp', 255)->default('text');
            $table->string('ph', 255)->default('text');
            $table->string('planting_distance', 255)->default('text');
            $table->string('fertilizer_dose', 255)->default('text');
            $table->string('potential_results', 255)->default('text');

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comodities');
    }
};
