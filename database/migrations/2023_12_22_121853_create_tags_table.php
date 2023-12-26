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
        Schema::create('tags', function (Blueprint $table) {
            $table->id('tag_id');
            $table->string('title');
            $table->string('slug');
            $table->boolean('status');
            $table->softDeletes();
            $table->timestamps();
//            $table->foreignId('created_by')->constrained('users');
//            $table->foreignId('updated_by')->constrained('users');

            //// Foreign keys
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('user_id')->on('users');

            $table->unsignedBigInteger('updated_by');
            $table->foreign('updated_by')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
