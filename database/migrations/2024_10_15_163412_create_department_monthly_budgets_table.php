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
        Schema::create('department_monthly_budgets', function (Blueprint $table) {
            $table->increments('department_monthly_budget_id');
            $table->unsignedInteger('department_yearly_budget_id')->constraint('department_yearly_budgets', 'department_yearly_budget_id');
            // $table->foreignId('user_id')
            // ->constrained()
            // ->onDelete('cascade');

            // $table->unsignedInteger('department_id')->constraint('departments', 'department_id');
            // $table->string('budget_name');
            $table->string('budget_code');
            $table->integer('month');
            $table->decimal('budget_monthly', 15, 2);
            $table->decimal('remaining_budget', 15, 2);
            $table->timestamps();

            // $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade');
            $table->foreign('department_yearly_budget_id')->references('department_yearly_budget_id')->on('department_yearly_budgets')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_monthly_budgets');
    }
};
