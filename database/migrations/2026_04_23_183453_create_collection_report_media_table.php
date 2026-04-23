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
        Schema::create('collection_report_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_report_id')->constrained('collection_reports')->cascadeOnDelete();
            $table->string('filename');
             $table->string('path');
            $table->string('mime_type');
            $table->unsignedBigInteger('size');
            $table->string('alt_text')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_report_media');
    }
};
