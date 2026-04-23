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
        Schema::create('redeemables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('redeemable_category_id')->constrained('redeemable_categories')->cascadeOnDelete();
            $table->string('item_name');
            $table->text('description')->nullable();
            $table->double('points_required', 15, 2);
            $table->integer('stock')->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redeemables');
    }
};
