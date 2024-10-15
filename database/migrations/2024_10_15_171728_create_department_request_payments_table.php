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
        Schema::create('department_request_payments', function (Blueprint $table) {
            $table->increments('department_request_payment_id');
            $table->string('department_request_payment_number');
            $table->foreignId('employee_id')
            ->constrained('employees', 'employee_id')
            ->onDelete('cascade');
            $table->unsignedInteger('department_monthly_budget_id')->constraint('department_monthly_budgets', 'department_monthly_budget_id');
            // $table->unsignedInteger('department_id')->constraint('departments', 'department_id');
            // $table->integer('month');
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('finance_id');
            $table->date('date');
            $table->string('paid_to');
            $table->string('paid_via');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('document_number');
            $table->text('file_invoice');
            $table->text('note')->nullable();
            $table->decimal('total_cost', 15, 2)->nullable();
            $table->foreign('manager_id')->references('employee_id')->on('employees')->onDelete('cascade'); // Adjust the delete behavior if necessary
            $table->foreign('finance_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->foreign('department_monthly_budget_id')->references('department_monthly_budget_id')->on('department_monthly_budgets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_request_payments');
    }
};
