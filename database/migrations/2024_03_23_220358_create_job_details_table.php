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
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug');
            $table->string('company');
            $table->string('city')->index();
            $table->string('image');
            $table->date('deadline');
            $table->longText('content');
            $table->string('email');
            // $table->foreignId('category_id')->references('id')->on('job_categories')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('category_id')->references('id')->on('job_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('employer_id')->references('id')->on('employers')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_details');
    }
};
