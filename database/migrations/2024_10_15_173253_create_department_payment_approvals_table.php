<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('department_payment_approvals', function (Blueprint $table) {
            $table->increments('department_payment_approval_id');
            $table->unsignedInteger('department_request_payment_id')->constraint('department_request_payments', 'department_request_payment_id');
            $table->foreignId('employee_id')
            ->constrained('employees', 'employee_id')
            ->onDelete('cascade');
            $table->string('stage'); // Kolom stage dengan nilai default
            $table->string('status', 255);
            $table->text('note')->nullable();
            // $table->foreign('manager_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_request_payment_id')->references('department_request_payment_id')->on('department_request_payments')->onDelete('cascade');

            $table->timestamps();
        });


        // Tambahkan raw SQL untuk `CHECK` constraints setelah create table
        DB::statement("ALTER TABLE department_payment_approvals ADD CONSTRAINT check_status CHECK (status IN ('pending', 'approved', 'rejected'))");
        DB::statement("ALTER TABLE department_payment_approvals ADD CONSTRAINT check_stage CHECK (stage IN ('manager', 'finance'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_payment_approvals');
    }
};
