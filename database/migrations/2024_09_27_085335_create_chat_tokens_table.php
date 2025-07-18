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
        Schema::create('chat_tokens', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing primary key.
            $table->unsignedBigInteger('ride_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('user_id');
            $table->string('chat_token');
            $table->timestamps(); // This will add created_at and updated_at columns.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_tokens');
    }
};
