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
        Schema::create('department_request_payment_items', function (Blueprint $table) {
            $table->increments('department_request_payment_item_id');
            $table->unsignedInteger('department_request_payment_id')->constraint('department_request_payments', 'department_request_payment_id');
            $table->string('description');
            $table->decimal('amount', 15, 2);
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('department_request_payment_id')->references('department_request_payment_id')->on('department_request_payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_request_payment_items');
    }
};
