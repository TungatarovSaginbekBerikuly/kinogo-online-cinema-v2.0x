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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('alias')->unique();
            $table->string('director');
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->foreignId('release_year_id')
                  ->constrained('release_years')
                  ->cascadeOnDelete();                             
            $table->string('translator')->nullable();
            $table->integer('duration');
            $table->text('description');
            $table->text('player');
            $table->boolean('is_recommended');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
