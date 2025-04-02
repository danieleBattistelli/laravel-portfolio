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
            //elimino tabella category
            $table->dropColumn("category");

            //aggiungiamo la colonna con id di category
            $table->foreignId("category_id")->default(1)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {

            //ricreo la tabella category
            $table->string("category");

            //eliminiamo la constreighn
            $table->dropForeign("posts_category_id_foreign");

            //eliminiamo la colonna
            $table->dropColumn("category_id");
        });
    }
};
