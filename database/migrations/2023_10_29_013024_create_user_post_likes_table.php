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
        Schema::create('user_post_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->timestamps();

            // Index
            $table->index('user_id', 'user_post_likes_user_idx');
            $table->index('post_id', 'user_post_likes_post_idx');

            // Foreign key
            $table->foreign('user_id', 'user_post_likes_user_fk')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('post_id', 'user_post_likes_post_fk')->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_post_likes');
    }
};
