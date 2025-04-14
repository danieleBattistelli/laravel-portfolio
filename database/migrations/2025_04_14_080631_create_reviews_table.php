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

            $table->string('gametitle');
            $table->string('image');
            $table->unsignedBigInteger('genre_id');
            $table->string('reviewTitle');
            $table->text('reviewBody');
            $table->decimal('rating', 3, 1);
            $table->string('reviewerName');
            $table->date('reviewDate');
            $table->date('lastUpdated');

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
