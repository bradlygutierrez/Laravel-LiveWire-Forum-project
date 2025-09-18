<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            if (!Schema::hasColumn('answers', 'blog_id')) {
                $table->foreignId('blog_id')->nullable()->constrained()->cascadeOnDelete();
            }

            if (!Schema::hasColumn('answers', 'question_id')) {
                $table->foreignId('question_id')->nullable()->constrained()->cascadeOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign(['blog_id']);
            $table->dropColumn('blog_id');

            $table->dropForeign(['question_id']);
            $table->dropColumn('question_id');
        });
    }
};
