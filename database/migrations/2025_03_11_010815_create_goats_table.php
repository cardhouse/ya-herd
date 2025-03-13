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

        Schema::create('goats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('herd_id')->constrained();
            $table->string('name');
            $table->string('breed')->nullable();
            $table->enum('sex', ["M","F"])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goats');
    }
};
