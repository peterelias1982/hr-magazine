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
            $table->string('slug');
            $table->string('image');
            $table->text('content');
            $table->foreignId('category_id')->references('id')->on('article_categories')->onDelete('restrict')->onUpdate('restrict');
            // $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('user_id')  // Use foreignId() for Laravel conventions
            // ->constrained('users')  // Constrained method for both table name and foreign key creation
            // ->onDelete('set null')  // Set related_table_id to NULL on deletion
            // ->onUpdate('cascade');  // Update related_table_id when referenced record is updated
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->boolean('approved')->default(1);
            // $table->morphs('articleable');
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
