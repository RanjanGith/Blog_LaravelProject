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
            $table->id('comment_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('comment');
            $table->boolean('status');
//            $table->foreignId('post_id')->constrained('posts');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->timestamps();

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
