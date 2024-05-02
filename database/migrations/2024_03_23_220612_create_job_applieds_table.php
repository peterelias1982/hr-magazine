<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_applieds', function (Blueprint $table) {
            $table->primary(['jobDetail_id', 'jobSeeker_id'], 'id');
            $table->foreignId('jobDetail_id')
                ->references('id')
                ->on('job_details')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('jobSeeker_id')
                ->references('id')
                ->on('job_seekers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applieds');
    }
};
