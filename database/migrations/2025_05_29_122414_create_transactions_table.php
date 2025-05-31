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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('product_price')->nullable();
            $table->string('sale_type')->nullable();
            $table->date('transaction_date')->nullable();
            $table->unsignedBigInteger('customer_id'); // ستون کلید خارجی
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade'); // کلید خارجی
            $table->unsignedBigInteger('product_id'); // ستون کلید خارجی
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // کلید خارجی
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
