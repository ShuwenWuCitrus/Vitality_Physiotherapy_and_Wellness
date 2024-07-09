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
        Schema::create('occupation_areas', function (Blueprint $table) {
            $table->foreignId('service_id')->constrained();
            $table->foreignId('professional_id')->constrained();
            $table->primary(['service_id', 'professional_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupation_areas');
    }
};
