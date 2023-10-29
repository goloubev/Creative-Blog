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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->text('message');
            $table->timestamps();

            // Index
            $table->index('user_id', 'comments_user_idx');
            $table->index('post_id', 'comments_post_idx');

            // Foreign key
            $table->foreign('user_id', 'comments_user_fk')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('post_id', 'comments_post_fk')->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
