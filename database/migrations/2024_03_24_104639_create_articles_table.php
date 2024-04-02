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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->string('image');
            $table->text('content');
            $table->foreignId('category_id')->references('id')->on('article_categories')->onDelete('restrict')->onUpdate('restrict');

            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('author_id')->nullable()->references('id')->on('authors')->onDelete('restrict')->onUpdate('restrict');

            $table->boolean('approved')->default(1);
            // $table->nullableMorphs('articleable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
