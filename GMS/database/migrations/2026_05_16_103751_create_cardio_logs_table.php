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
        Schema::create('cardio_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('exercise_type'); // Running, Cycling etc.
        $table->unsignedInteger('duration'); // in minutes
        $table->decimal('distance', 5, 2)->nullable(); // in km
        $table->decimal('calories', 8, 2)->nullable(); // auto-calculated
        $table->text('notes')->nullable();
        $table->date('logged_at'); // date of session
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
Schema::dropIfExists('cardio_logs');
    }
};
