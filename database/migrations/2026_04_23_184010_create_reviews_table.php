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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->ulid('ulid')->unique();
            $table->foreignId('resident_id')->constrained('residents')->cascadeOnDelete();
            $table->foreignId('purok_id')->constrained('puroks')->cascadeOnDelete();
            $table->foreignId('review_category_id')->constrained('review_categories')->cascadeOnDelete();
            $table->string('fullname')->nullable();
            $table->text('content')->nullable();
            $table->text('suggestion')->nullable();
            $table->decimal('rating', 3, 1)->nullable();
            $table->string('status')->default('pending');
            $table->boolean('is_anonymous')->default(false);
            $table->string('moderation_flag')->default('none');
            $table->decimal('moderation_score', 3, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
