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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Customer's name
            $table->string('designation')->nullable(); // Optional: Customer's designation or title
            $table->string('company')->nullable(); // Optional: Customer's company name
            $table->text('message'); // The testimonial message
            $table->string('image')->nullable(); // Optional: Path to customer's image
            $table->integer('rating')->default(5); // Rating out of 5
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
