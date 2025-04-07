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
        Schema::table('posts', function (Blueprint $table) {
            $table->text('image')->nullable()->after('content');
            // Aggiungi la colonna 'image' alla tabella 'posts'
            // La colonna sarà di tipo string e potrà essere null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('image');
            // Rimuovi la colonna 'image' dalla tabella 'posts'
        });
    }
};
