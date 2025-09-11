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
        DB::table('blogs')->get()->each(function ($blog) {
            DB::table('blogs')->where('id', $blog->id)->update([
                'content' => json_encode([
                    ['type' => 'paragraph', 'text' => $blog->content]
                ])
            ]);
        });

        // 2. Change column type to JSON
        Schema::table('blogs', function (Blueprint $table) {
            $table->json('content')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('blogs', function (Blueprint $table) {
            $table->text('content')->change();
        });
    }
};
