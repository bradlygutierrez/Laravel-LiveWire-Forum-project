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
         Schema::table('answers', function (Blueprint $table) {
            // primero hay que soltar la foreign key antes de modificar
            $table->dropForeign(['question_id']);
            $table->unsignedBigInteger('question_id')->nullable()->change();
            $table->foreign('question_id')->references('id')->on('questions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
            $table->unsignedBigInteger('question_id')->nullable(false)->change();
            $table->foreign('question_id')->references('id')->on('questions')->cascadeOnDelete();
        });
    }
};
