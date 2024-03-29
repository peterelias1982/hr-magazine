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
        Schema::create('article_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('content');
            // $table->bigInteger('parentComment')->references('id')->on('article_comments')->onDelete('cascade')->onUpdate('cascade')->nullable();
            // $table->unsignedBigInteger('parentComment')->constrained('article_comments')->onDelete('cascade')->onUpdate('cascade')->nullable(); // Changed type to unsignedBigInteger and added nullable
            
            // $table->unsignedBigInteger('parentComment')->nullable(); // Changed type to unsignedBigInteger and added nullable
            // $table->foreignId('parentComment')->constrained('article_comments')->onDelete('cascade')->onUpdate('cascade'); // Use constrained() for parentComment

            $table->foreignId('parentComment')->references('id')->on('article_comments')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('article_id')->references('id')->on('article_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_comments');
    }
};
