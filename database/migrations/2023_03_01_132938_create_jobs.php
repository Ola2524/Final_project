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
        Schema::create('jobs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('service_id');
                $table->unsignedBigInteger('worker_id');
                $table->enum('status', ['Done', 'Pending' ,'Rejected','In progress'])->default('Pending');
                $table->float('rate')->default(0);
                $table->date('date')->nullable();
                $table->float('price')->default(0);
                $table->text('desc');
                $table->text('review')->nullable();
                $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};