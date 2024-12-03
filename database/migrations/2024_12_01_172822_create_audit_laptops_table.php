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
        Schema::create('audit_laptops', function (Blueprint $table) {
            $table->increments('audit_laptop_id');
            $table->foreignId('employee_id')->constrained('employees', 'employee_id')->onDelete('cascade');
            $table->string('laptop_number')->nullable();
            $table->string('laptop_type')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('no_asset')->nullable();

            // Existing fields...
            $table->string('processor')->nullable();
            $table->string('processor_other')->nullable();
            $table->string('ram')->nullable();
            $table->string('ram_other')->nullable();
            $table->string('ssd')->nullable();
            $table->string('ssd_other')->nullable();
            $table->integer('battery_current_capacity')->nullable();
            $table->integer('battery_design_capacity')->nullable();

            // Add audit status column
            $table->enum('audit_status', ['Pending', 'Completed'])->default('Pending');

            // Existing component fields
            $table->enum('charger', ['Good', 'Damaged', 'Missing'])->nullable();
            $table->text('charger_reason')->nullable();

            $table->enum('lcd', ['Good', 'Damaged', 'Missing'])->nullable();
            $table->text('lcd_reason')->nullable();

            $table->enum('keyboard', ['Good', 'Damaged', 'Missing'])->nullable();
            $table->text('keyboard_reason')->nullable();

            $table->enum('body', ['Good', 'Damaged', 'Missing'])->nullable();
            $table->text('body_reason')->nullable();

            $table->enum('speaker', ['Good', 'Damaged', 'Missing'])->nullable();
            $table->text('speaker_reason')->nullable();

            $table->enum('camera', ['Good', 'Damaged', 'Missing'])->nullable();
            $table->text('camera_reason')->nullable();

            $table->text('other')->nullable();
            $table->string('user_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_laptops');
    }
};
