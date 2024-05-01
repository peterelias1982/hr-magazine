<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\CareerLevel;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->string('company');
            $table->text('about_company');
            $table->integer('streetNo');
            $table->string('streetName');
            $table->string('city')->index();
            $table->string('state');
            $table->string('postalCode');
            $table->string('country');
            $table->string('image');
            $table->date('deadline');
            $table->longText('content');
            $table->string('email');
            $table->enum('careerLevel', [
                CareerLevel::Entry->value,
                CareerLevel::Intermediate->value,
                CareerLevel::Experience->value]);
            $table->foreignId('category_id')
                ->references('id')
                ->on('job_categories')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreignId('employer_id')
                ->references('id')
                ->on('employers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
