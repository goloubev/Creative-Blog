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
            $table->index('user_id', 'pul_user_idx');
            $table->index('post_id', 'pul_post_idx');

            // Foreign key
            $table->foreign('user_id', 'pul_user_fk')->references('id')->on('users');
            $table->foreign('post_id', 'pul_post_fk')->references('id')->on('posts');
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
