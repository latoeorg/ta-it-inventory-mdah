<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(now());
            $table->date('target_date');
            $table->string('customer')->nullable();
            $table->integer('additional_fee')->default(0);
            $table->string('note')->nullable();
            $table->integer('subtotal')->default(0);
            $table->integer('total_amount')->default(0);
            $table->string('status')->default('DRAFT');
            $table->foreignId('creator_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};
