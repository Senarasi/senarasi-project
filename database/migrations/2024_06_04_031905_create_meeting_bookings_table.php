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
        Schema::create('meeting_bookings', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->unsignedInteger('employee_id')->constraint('employees', 'employee_id');
            $table->unsignedInteger('room_id')->constraint('meeting_rooms', 'room_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('phone');
            $table->date('start_time');
            $table->date('end_time');
            $table->timestamps();

            $table->foreign('room_id')->references('room_id')->on('meeting_rooms')->onDelete('cascade');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_bookings');
    }
};
