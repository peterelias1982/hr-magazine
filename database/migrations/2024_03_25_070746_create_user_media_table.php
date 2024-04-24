<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\MediaName;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_media', function (Blueprint $table) {
            $table->primary(['user_id', 'social_id'], 'id');
            $table->foreignId('user_id')
                ->constrained("users")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('social_id')
                ->constrained("social_media")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string("value");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_media');
    }
};
