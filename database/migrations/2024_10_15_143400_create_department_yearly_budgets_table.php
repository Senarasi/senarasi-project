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
        Schema::create('department_yearly_budgets', function (Blueprint $table) {
            $table->increments('department_yearly_budget_id');
            $table->foreignId('employee_id')
            ->constrained('employees', 'employee_id')
            ->onDelete('cascade');
            $table->unsignedInteger('department_id')->constraint('departments', 'department_id');
            $table->string('budget_name');
            $table->integer('year');
            $table->string('budget_code');
            $table->decimal('budget_yearly', 15, 2);
            $table->decimal('budget_monthly', 15, 2);
            $table->decimal('remaining_budget', 15, 2);
            $table->timestamps();

            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_yearly_budgets');
    }
};
