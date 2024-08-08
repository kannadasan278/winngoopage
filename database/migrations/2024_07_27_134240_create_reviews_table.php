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
    $table->unsignedBigInteger('merchant_id');
    $table->string('name');
    $table->string('email');
    $table->string('website')->nullable();
    $table->text('comment');
    $table->integer('rating')->nullable()->default('5'); // Rating out of 5
    $table->enum('status', ['active','inactive'])->default('inactive');
    $table->timestamps();

    // Foreign key constraint
    $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
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
