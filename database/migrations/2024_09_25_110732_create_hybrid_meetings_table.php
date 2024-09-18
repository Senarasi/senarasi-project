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
        Schema::create('hybrid_meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
            ->constrained()
            ->onDelete('cascade');
            $table->string('via');
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hybrid_meetings');
    }
};
