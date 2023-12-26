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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('categories_id');
            $table->string('title');
            $table->string('slug');
            $table->integer('rank');
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
            // Foreign keys
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

//            $table->dropForeign(['created_by']);
//            $table->dropForeign(['updated_by']);

        });
        Schema::dropIfExists('categories');
    }
};
