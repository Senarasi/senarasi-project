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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('employee_id')->constraint('employees', 'employee_id');
            $table->foreignId('room_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('desc');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('br_number');
            // $table->string('hybridvia')->nullable();
            $table->boolean('confirmation_sent')->default(false);
            $table->string('google_event_id')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
