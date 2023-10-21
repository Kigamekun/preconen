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
        Schema::create('planting_plannings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comodity_id');
            $table->date('start_from');
            $table->date('end_at');

            $table->foreign('comodity_id')->references('id')->on('comodities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planting_plannings');
    }
};
