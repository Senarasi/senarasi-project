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
        Schema::create('total_costs', function (Blueprint $table) {
            $table->id('total_cost_id');
            $table->integer('request_budget_id')->unsigned();
            $table->decimal('total_locations_cost', 10, 2)->default(0);
            $table->decimal('total_operationals_cost', 10, 2)->default(0);
            $table->decimal('total_performers_cost', 10, 2)->default(0);
            $table->decimal('total_production_crews_cost', 10, 2)->default(0);
            $table->decimal('total_production_tools_cost', 10, 2)->default(0);
            $table->decimal('total_cost', 10, 2)->storedAs('total_locations_cost + total_operationals_cost + total_performers_cost + total_production_crews_cost + total_production_tools_cost');
            $table->timestamps();

            $table->foreign('request_budget_id')->references('request_budget_id')->on('request_budgets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_costs');
    }
};
