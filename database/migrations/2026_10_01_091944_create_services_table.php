<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('badge')->nullable(); // e.g., 'CONSULTING', 'OUTSOURCING'
            $table->text('description');
            $table->json('features')->nullable(); // Bullet points for UI card display
            $table->string('image')->nullable();
            $table->string('accent')->default('emerald'); // emerald, teal, or violet
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};