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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->float('points')->default(0);
            $table->enum('role', ['worker', 'user' ,'admin'])->default('user');
            $table->string('street');
            $table->string('country');
            $table->string('city');
            $table->string('img')->nullable();
            $table->text('bio')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->rememberToken();
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
