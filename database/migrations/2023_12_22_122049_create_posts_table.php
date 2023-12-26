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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
//              $table->foreignId('category_id')->constrained('categories');
            $table->string('title');
            $table->string('slug');
            $table->string('feature_image')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status');
            $table->integer('view_count')->default(0);
            $table->softDeletes();
            $table->timestamps();
//            $table->foreignId('created_by')->constrained('users');
//            $table->foreignId('updated_by')->constrained('users');
//
            //Foreign keys
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('categories_id')->on('categories');
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
        Schema::table('users', function (Blueprint $table) {
            //$table->dropColumn(columns: 'address');

//            $table->dropForeign(['categories_id']);
//            $table->dropForeign(['created_by']);
//            $table->dropForeign(['updated_by']);

        });
        Schema::dropIfExists('posts');
    }
};
