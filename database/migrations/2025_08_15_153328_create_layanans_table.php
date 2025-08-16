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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('subtitle')->nullable();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
