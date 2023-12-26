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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name',length: 20);
            $table->string('email')->unique();
            $table->string('phone',length: 12);
            $table->string('address',length: 30);
            $table->string('password',length: 16);
            $table->string('image')->nullable();
            $table->boolean('is_admin');
//            $table->timestamp('email_verified_at')->nullable();
//            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
