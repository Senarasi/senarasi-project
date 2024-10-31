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
            $table->string('laptop_number');
            $table->string('serial_number');
            $table->string('no_asset');
            $table->string('processor');
            $table->string('ram');
            $table->string('ssd');
            $table->string('charger');
            $table->string('battery');
            $table->string('layar');
            $table->string('keyboard');
            $table->string('body');
            $table->string('speaker');
            $table->string('kamera');
            $table->string('lainnya');
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
