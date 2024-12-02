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
        Schema::create('annunci', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // title (varchar 255)
            $table->longText('images')->nullable(); // images (longtext, nullable)
            $table->string('adType'); // adType (varchar 255)
            $table->text('description')->nullable(); // description (text, nullable)
            $table->string('condition'); // condition (varchar 255)
            $table->decimal('price', 10, 2)->default(0.00); // price (decimal 10,2, default 0.00)
            $table->string('position'); // position (varchar 255)
            $table->unsignedBigInteger('user_id'); // user_id (bigint, unsigned)
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annunci');
    }
};
