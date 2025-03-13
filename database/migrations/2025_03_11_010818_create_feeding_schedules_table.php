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
        Schema::disableForeignKeyConstraints();

        Schema::create('feeding_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('herd_id')->constrained();
            $table->foreignId('goat_id')->nullable()->constrained();
            $table->dateTime('scheduled_at');
            $table->text('details');
            $table->foreignId('goat_nullable_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeding_schedules');
    }
};
