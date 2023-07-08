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
            $table->unsignedInteger('post_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedTinyInteger('layer')->default(0);
            $table->string('user_name', 256);
            $table->string('content', 512);
            $table->timestamps();

            $table->index('post_id');
            $table->foreign('parent_id')->references('id')->on('comments');
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
