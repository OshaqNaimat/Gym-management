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
    Schema::create('gym_settings', function (Blueprint $table) {
        $table->id();
        $table->string('gym_name')->default('MYGYM');
        $table->string('email')->default('admin@pumphouse.gym');
        $table->string('phone')->default('+92 300 0000000');
        $table->string('address')->default('123 Fitness Ave, Rawalpindi');
        $table->time('weekday_open')->default('05:00');
        $table->time('weekday_close')->default('22:00');
        $table->time('saturday_open')->default('07:00');
        $table->time('saturday_close')->default('20:00');
        $table->time('sunday_open')->default('08:00');
        $table->time('sunday_close')->default('18:00');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_settings');
    }
};
